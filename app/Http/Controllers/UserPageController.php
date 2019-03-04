<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserPageRequest;
use App\Repositories\UserPageRepository;

class UserPageController extends Controller
{
    protected $user;

    public function __construct(UserPageRepository $user)
    {
        $this->user = $user;
    }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        // dd($id);
        // return view('fontend.userpages.user_profile');
        try 
        {
            $user = $this->user->findOrFail($id);
            
            return view('fontend.userpages.user_profile', compact('user'));
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
    public function update(UserPageRequest $request, $id)
    {
        // dd($id);
        try
        {
            $user = $this->user->update($request, $id);
            // dd($request);

            return redirect(route('user_page.edit',$id))->with('message', __('label.edit_sussess'));
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
        //
    }
}
