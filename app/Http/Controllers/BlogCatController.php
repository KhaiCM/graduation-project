<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryPost;

class BlogCatController extends Controller
{
    public function getList()
    {
        $cat = CategoryPost::paginate(config('app.blog_cat_page'));

        return view('backend.blogcats.showblogcat', ['cat' => $cat]);
    }

    public function addblogcat()
    {
        return view('backend.blogcats.addblogcat');
    }

    public function postblogcat(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|min:3|max:100'
        ],
        [
            'name.required' => trans('message.cannotblank'),
        ]);
    }
}
