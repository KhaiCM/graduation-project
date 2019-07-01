<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPageRequest;
use App\Repositories\UserPageRepository;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
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
        $user = $this->user->listUser();
        // dd($user);
        return view('backend.users.list_user', compact('user'));
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
        try
        {
            $user = $this->user->findOrFail($id);

            return view('backend.users.detail', compact('user'));
        } catch (ModelNotFoundException $ex) {
            echo $ex->getMessage();
        }
        // $user = User:: findOrFail($id);
        // return view('backend.users.detail', compact('user'));
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
        $user = $this->user->findOrFail($id);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $image = str_random(5) . $name;
            while (file_exists('upload/avatar' . $image)) {
                $image = str_random(5) . '.' . $image;
            }
            $file->move(config('app.avatar_path'), $image);

            if (file_exists($user->avatar)) {
                unlink(config('app.avatar_path') . $user->avatar);
            }
            if ($user->link != null) {
                $user->avatar = null;
            }
            $request->merge([
                'avatar' => $image,
            ]);
        }
        $user = $this->user->update($id, $request->all());

        return redirect(route('user.detail', $id))->with('message', __('label.edit_sussess'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bl = Post::find($id);
        $bl->delete();

        return view('backend.users.list_user', compact('bl'))->with('noti', 'success');
    }

    public function editPermission($id)
    {
        $user = $this->user->findOrFail($id);
        $role = Role::all();
        // dd($role);
        
        return view('backend.users.edit_permission', compact('user', 'role'));
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $userSearch = ($request->has('search') ? $request->get('search') : false);
        $query = User::select('id', 'name', 'email', 'created_at');
        // dd($query);
        if ($request->has('search')) {
            $query->where('name', $request->get('search'));
        }
        // dd($query);
        $filter = $query->paginate(config('app.blog_page'));

        return view('backend.users.filter', compact('filter'));
    }
}
