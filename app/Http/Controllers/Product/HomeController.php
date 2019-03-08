<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Controllers\Controller;

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
}
