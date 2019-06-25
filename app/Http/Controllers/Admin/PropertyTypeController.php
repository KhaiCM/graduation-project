<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PropertyCategory;
use App\Models\PropertyType;
use App\Http\Requests\PropertyTypeRequest;
use App\Repositories\PropertyTypeRepository;

class PropertyTypeController extends Controller
{
    protected $propertyType;
    
    public function __construct(PropertyTypeRepository $PropertyTypes)
    {
        $this->PropertyTypes = $PropertyTypes;
    }

    public function index()
    {
        $PropertyTypes = $this->PropertyTypes->all();
        $propertyCategories = PropertyCategory::all();
        // dd($propertyCategories);

        return view('backend.propertyType.show', compact('PropertyTypes', 'propertyCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propertyCategories = PropertyCategory::all();

        return view('backend.propertyType.show', compact('propertyCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyTypeRequest $request)
    {
        // dd($request->all());
        $PropertyTypes = $this->PropertyTypes->add($request);

        return redirect(route('protype.index'))->with('message', trans('message.add_success'));
    }

    public function edit($id)
    {
        try {
            $PropertyTypes = $this->PropertyTypes->findOrFail($id);
        $propertyCategories = PropertyCategory::all();
            $property_category = PropertyCategory::all();

            return view('backend.propertyType.edit', compact('PropertyTypes', 'property_category'));
        } catch (ModelNotFoundException $ex) {
            return $ex->getMessage();
        }
    }

    public function update(PropertyTypeRequest $request, $id)
    {
        try
        {
            $PropertyTypes = $this->PropertyTypes->update($request, $id);

            return redirect(route('protype.index'))->with('message', trans('province.edit_success'));
        } catch (ModelNotFoundException $ex)
        {
            return $ex->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $this->PropertyTypes->destroy($id);

            return redirect(route('protype.index'))->with('message', trans('province.delete_success'));
        } catch (ModelNotFoundException $ex) {
            return $ex->getMessage();
        }
    }
}
