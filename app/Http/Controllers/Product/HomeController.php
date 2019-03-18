<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Unit;
use App\Models\Comment;
use App\Models\PropertyCategory;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $properties = Property::paginate(config('pagination.home'));

        return view('fontend.homepages.homepage', compact('properties'));
    }
    public function getProSold()
    {
        $properties = Property::where('form', '1')->paginate(config('pagination.all'));

        return view('fontend.homepages.property_list', compact('properties'));
    }

    public function getProRent()
    {
        $properties = Property::where('form', '0')->paginate(config('pagination.all'));

        return view('fontend.homepages.property_list', compact('properties'));
    }

    public function find($id)
    {
        try {
            $property = Property::findOrFail($id);
            $comments = Property::where('property_id', $id);
            $categories = PropertyCategory::all();

            return view('fontend.homepages.property_detail', compact([
                'property',
                'comments',
                'categories',
            ]));
        } catch (ModelNotFoundException $ex) {
            $ex->getMessage();
        }
    }

    public function comment(CommentRequest $request, $id)
    {
        try
        {
            $property = Property::findOrFail($id);
            $comment = Comment::create([
                'user_id' => Auth::user()->id,
                'property_id' => $id,
                'content' => $request->input('content'),
            ]);

            return Redirect::back();
        } catch (ModelNotFoundException $ex)
        {
            $ex->getMessage();
        }
    }
}
