<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        $province = ($request->has('province') ? $request->get('province') : false);
        $district = ($request->has('district') ? $request->get('district') : false);
        $property_category = ($request->has('property_category') ? $request->get('property_category') : false);
        $property_type = ($request->has('property_type') ? $request->get('property_type') : false);
        $acreage = ($request->has('acreage') ? $request->get('acreage') : false);
        $price = ($request->has('price') ? $request->get('price') : false);
        $form = ($request->has('form') ? $request->get('form') : false);

        $query = Property::
            join('property_types', 'property_types.id', '=', 'properties.property_type_id')
            ->join('districts', 'districts.id', '=', 'properties.district_id')
            ->select('properties.id', 'properties.name as property_name', 'properties.user_id', 'properties.created_at', 'address', 'describe', 'image', 'acreage', 'price', 'districts.name', 'property_types.name')
            ->with('users');
        if ($request->has('district')) {
            $query->where('districts.id', $request->get('district'));
        }

        if ($request->has('property_type')) {
            $query->where('property_types.id', $request->get('property_type'));
        }

        if ($request->has('acreage')) {
            $query = queryFilter($query, 'properties.acreage', config('search.acreage'), $request->get('acreage'));
        }

        if ($request->has('price')) {
            $query = queryFilter($query, 'properties.price', config('search.price'), $request->get('price'));
        }

        if ($request->has('form')) {
            $query->where('properties.form', $request->get('form'));
        }
        $filter = $query->get();

        return view('fontend.homepages.filter', compact('filter'));
    }
}

