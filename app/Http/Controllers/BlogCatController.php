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
            'name' => 'required|min:3|max:100'
        ],
        [
            'name.required' => trans('message.cannotblank'),
            'name.min' => trans('message.tooshort'),
            'name.max' => trans('message.toolong'),
        ]);

        $cat = new CategoryPost;
        $cat->name = $request->name;
        $cat->save();

        return redirect('admin/blogcat/addblogcat')->with('noti', 'success');
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
        try 
        {
            $cat = CategoryPost::findOrFail($id);
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }

        $this->validate($request,
        [
            'name' => '|required|min:3|max:100'
        ],
        [   
            'name.required' => trans('message.cannotblank'),
            'name.min' => trans('message.tooshort'),
            'name.max' => trans('message.toolong'),
        ]);

        $cat->name = $request->name;
        $cat->save();

        return redirect('blogcatlist')->with('noti', 'success');
    }

    public function getDeleteBlogCat($id)
    {
        $cat = CategoryPost::find($id);
        $cat->delete();

        return redirect('blogcatlist')->with('noti', 'success');
    }
}

