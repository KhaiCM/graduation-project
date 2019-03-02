<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProvinceRequest;
use App\Repositories\ProvinceRepository;
use App\Http\Controllers\Controller;

class ProvinceController extends Controller
{
    protected $province;

    public function __construct(ProvinceRepository $province)
    {
        $this->province = $province;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = $this->province->all();

    	return view('backend.province.show', compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.province.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinceRequest $request)
    {
        $provinces = $this->province->add($request);

        return redirect(route('province.create'))->with('message', trans('message.add_success'));;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $province = $this->province->findOrFail($id);

            return view('backend.province.edit', compact('province'));
        }
        catch (ModelNotFoundException $ex)
        {
            echo $ex->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinceRequest $request, $id)
    {
        try
        {
            $province = $this->province->update($request, $id);

            return redirect(route('province.index'))->with('message', trans('province.edit_success'));
        }
        catch (ModelNotFoundException $ex)
        {
            echo $ex->getMessage();
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
        try
        {
            $province = $this->province->destroy($id);

            return redirect(route('province.index'))->with('message', trans('province.delete_success'));
        }
        catch (ModelNotFoundException $ex)
        {
            echo $ex->getMessage();
        }
    }
}
