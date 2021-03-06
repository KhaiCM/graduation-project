<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function getList()
    {
        $bl = Post::orderBy('id', 'desc')->paginate(config('app.blog_page'));
        // dd($bl->all());

        return view('backend.blog.showblog', ['bl' => $bl]);
    }

    public function addBlog()
    {
        $cat = CategoryPost::all();

        return view('backend.blog.addblog', ['cat' => $cat]);
    }

    public function postAddBlog(BlogRequest $request)
    {
        $user = Auth::user()->id;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $file->move(config('app.blog_image'),$name);
        }
        $bl = new Post;
        $bl->image = str_random($name);
        $bl->title = Str::title($request->title);
        $bl->describe = $request->describe;
        $bl->slug = Str::slug($request->title);
        $bl->status = $request->status;
        $bl->category_post_id = $request->category_post_id;
        $bl->content = $request->content;
        $bl->user_id = $user;
        // dd($bl);
        $bl->save();

        return redirect('admin/blog/addblog')->with('noti', 'success');
    }

    public function getEditBlog($id)
    {
        try 
        {
            $bl = Post::findOrFail($id);
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
        $cat = CategoryPost::all();

        return view('backend.blog.editblog', ['bl' => $bl, 'cat' => $cat]);
    }

    public function postEditBlog(Request $request, $id)
    {
        $bl = Post::findOrFail($id);
        $imageNull = $bl->image;
        // dd($imageNull);
        $this->validate($request,
            [
                'title' => 'required|min:3|max:100',
                'describe' => 'required|min:3',
                'content' => 'required|min:3',
                'status' => 'required',
                'category_post_id' => 'required',
            ],
            [
                'title.required' => trans('message.cannotblank'),
                'title.min' => trans('message.tooshort'),
                'title.max' => trans('message.toolong'),
                'describe.required' => trans('message.cannotblank'),
                'describe.min' => trans('message.tooshort'),
                'describe.max' => trans('message.toolong'),
                'content.required' => trans('message.cannotblank'),
                'content.min' => trans('message.tooshort'),
                'content.max' => trans('message.toolong'),
                'status.required' => trans('message.cannotblank'),
                'category_post_id.required' => trans('message.cannotblank'),
            ]);

        $user = Auth::user()->id;
        if ($request->hasFile('file')) 
        {
            $file = $request->file('file');
            $file->move(config('app.blog_image'), $file->getClientOriginalName());
            $imageNull = $file->getClientOriginalName();
        }

        $bl->image = $imageNull;
        $bl->title = $request->title;
        $bl->describe = $request->describe;
        $bl->slug = Str::slug($request->title);
        $bl->status = $request->status;
        $bl->category_post_id = $request->category_post_id;
        $bl->content = $request->content;
        $bl->user_id = $user;
        $bl->save();

        return redirect('admin/blog/bloglist')->with('noti', 'success');
    }

    public function getDeleteBlog($id)
    {
        $bl = Post::findOrFail($id);
        $bl->delete();

        return redirect('admin/blog/bloglist')->with('noti', 'success');
    }
}

