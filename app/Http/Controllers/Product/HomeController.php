<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\District;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyType;
use App\Models\Province;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $province = [__('label.search_province')];
        $province = array_merge($province, Province::all()->pluck('name', 'id')->toArray());

        $district = [__('label.search_district')];
        $district = array_merge($district, District::all()->pluck('name', 'id')->toArray());

        $propertyCategory = [__('label.search_propertyCategory')];
        $propertyCategory = array_merge($propertyCategory, PropertyCategory::all()->pluck('name', 'id')->toArray());

        $propertyType = [__('label.search_propertyType')];
        $propertyType = array_merge($propertyType, PropertyType::all()->pluck('name', 'id')->toArray());

        $properties = Property::paginate(config('pagination.home'));

        return view('fontend.homepages.homepage', compact('properties', 'province', 'district', 'property', 'propertyType', 'propertyCategory'));
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
        } catch (ModelNotFoundException $ex) {
            $ex->getMessage();
        }
    }

    public function changeLanguage($language)
    {
        \Session::put('lang', $language);

        return redirect()->back();
    }
}
