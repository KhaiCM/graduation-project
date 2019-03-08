<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\PropertyType;
use App\Models\Province;
use App\Models\PropertyCategory;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $province = Province::all();
        $provinces = [];
        foreach ($province as $item) {
            $provinces[$item->id] = $item->name;
        }
        $district = District::all();
        $districts = [];
        foreach ($district as $item) {
            $districts[$item->id] = $item->name;
        }
        $propertyCategory = PropertyCategory:: all();
        $propertyCategorys= [];
        foreach ($propertyCategory as $item) {
            $propertyCategorys[$item->id] = $item->name;
        }
        $propertyType = PropertyType::all();
        $propertyTypes = [];
        foreach ($propertyType as $item) {
            $propertyTypes[$item->id] = $item->name;
        }
        
        return view('fontend.properties.property_submit', compact('provinces', 'districts', 'propertyCategorys', 'propertyTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
