<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryPost;

class BlogCatController extends Controller
{
    public function getList()
    {
        $cat = CategoryPost::orderBy('id', 'desc')->paginate(config('app.blog_cat_page'));

        return view('backend.blogcats.showblogcat', ['cat' => $cat]);
    }

    public function addBlogCat()
    {
        return view('backend.blogcats.addblogcat');
    }

    public function postAddBlogCat(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:category_posts|min:3|max:100'
            ],
            [
                'name.required' => trans('message.cannotblank'),
                'name.min' => trans('message.tooshort'),
                'name.max' => trans('message.toolong'),
            ]);

        $cat = new CategoryPost;
        $cat->name = $request->name;
        $cat->save();

        return redirect('admin/blogcat/blogcatlist')->with('noti', 'success');
    }

    public function getEditBlogCat($id)
    {
        try 
        {
            $cat = CategoryPost::findOrFail($id);
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }

        return view('backend.blogcats.editblogcat', ['cat' => $cat]);
    }

    public function postEditBlogCat(Request $request, $id)
    {

        $cat = CategoryPost::findOrFail($id);
        $this->validate($request,
            [
                'name' => '|required|unique:category_posts|min:3|max:100'
            ],
            [   
                'name.required' => trans('message.cannotblank'),
                'name.min' => trans('message.tooshort'),
                'name.max' => trans('message.toolong'),
            ]);

        $cat->name = $request->name;
        $cat->save();

        return redirect('admin/blogcat/blogcatlist')->with('noti', 'success');
    }

    public function getDeleteBlogCat($id)
    {
        $cat = CategoryPost::findOrFail($id);
        $cat->delete($id);

        return redirect('admin/blogcat/blogcatlist')->with('noti', 'success');
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $userSearch = ($request->has('search') ? $request->get('search') : false);
        $query = CategoryPost::select('id', 'name', 'created_at');
        // dd($query);
        if ($request->has('search')) {
            $query->where('name', $request->get('search'));
        }
        // dd($query);
        $filter = $query->paginate(config('app.blog_cat_page'));

        return view('backend.blogcats.filter', compact('filter'));
    }
}

