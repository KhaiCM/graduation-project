<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PropertyCategory;
use App\Http\Requests\PropertyCategoryRequest;
use App\Repositories\PropertyCategoryRepository;

class PropertyCategoryController extends Controller
{
    protected $propertyCategories;
    
    public function __construct(PropertyCategoryRepository $propertyCategories)
    {
        $this->propertyCategories = $propertyCategories;
    }

    public function index()
    {
        $propertyCategories = $this->propertyCategories->all();

        return view('backend.propertycategory.show', compact('propertyCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propertyCategories = PropertyCategory::all();

        return view('backend.propertycategory.create', compact('propertyCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyCategoryRequest $request)
    {
        $propertyCategories = $this->propertyCategories->add($request);

        return redirect(route('procat.index'))->with('message', trans('message.add_success'));
    }

    public function edit($id)
    {
        try {
            $propertyCategories = $this->propertyCategories->findOrFail($id);

            return view('backend.propertycategory.edit', compact('propertyCategories'));
        } catch (ModelNotFoundException $ex) {
            return $ex->getMessage();
        }
    }

    public function update(PropertyCategoryRequest $request, $id)
    {
        try
        {
            $propertyCategories = $this->propertyCategories->update($request, $id);

            return redirect(route('procat.index'))->with('message', trans('province.edit_success'));
        } catch (ModelNotFoundException $ex)
        {
            return $ex->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $this->propertyCategories->destroy($id);

            return redirect(route('procat.index'))->with('message', trans('province.delete_success'));
        } catch (ModelNotFoundException $ex) {
            return $ex->getMessage();
        }
    }
}
