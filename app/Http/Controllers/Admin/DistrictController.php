<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Http\Requests\DistrictRequest;
use App\Repositories\DistrictRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DistrictController extends Controller
{
    protected $district;

    public function __construct(DistrictRepository $district)
    {
        $this->district = $district;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = $this->district->all();

        return view('backend.district.show', compact( 'districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();

        return view('backend.district.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistrictRequest $request)
    {
        $district = $this->district->add($request);

        return redirect(route('district.create'))->with('message', trans('message.add_success'));;
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
        try {
            $district = $this->district->findOrFail($id);
            $provinces = Province::all();

            return view('backend.district.edit', compact([
                'district',
                'provinces',
            ]));
        } catch (ModelNotFoundException $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DistrictRequest $request, $id)
    {
        try
        {
            $district = $this->district->update($request, $id);

            return redirect(route('district.index'))->with('message', trans('province.edit_success'));
        } catch (ModelNotFoundException $ex)
        {
            return $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->district->destroy($id);

            return redirect(route('district.index'))->with('message', trans('province.delete_success'));
        } catch (ModelNotFoundException $ex) {
            return $ex->getMessage();
        }
    }
}
