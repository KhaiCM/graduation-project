<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Egulias\EmailValidator\Warning\Comment;
use Carbon\Carbon;

class PostController extends Controller
{
    public function getPost()
    {
        $posts = Post::paginate(config('pagination.all'));

        return view('fontend.posts.blog_list', compact('posts'));
    }

    public function getPostById($id)
    {
        try
        {
            $post = Post::findOrFail($id);

            return view('fontend.posts.detail_blog', compact('post'));
        } catch (ModelNotFoundException $ex)
        {
            $ex->getMessage();
        }
    }
}
