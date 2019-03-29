<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPageRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserPageRepository;
use App\Http\Requests\ChangePassRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\EloquentRepository;
use App\Events\FollowEvent;

class UserPageController extends Controller
{
    protected $user;

    public function __construct(UserPageRepository $user)
    {
        $this->user = $user;
    }

    public function getChangePass($id)
    {
        $user = $this->user->findOrFail($id);

        return view('fontend.userpages.change_pass', compact('user'));
    }

    public function postChangePass(ChangePassRequest $request, $id)
    {
        if (Hash::check($request->password, Auth::user()->password))
        {
            $pass = Hash::make($request->new_password);
            $request->merge([
                'password' => $pass,
            ]);
        }
        $user = $this->user->update($id, $request->all());

        return redirect(route('user.post_change', $id))->with('message', __('label.changePass_success'));
    }

    public function edit($id)
    {
        try
        {
            $user = $this->user->findOrFail($id);

            return view('fontend.userpages.user_profile', compact('user'));
        } catch (ModelNotFoundException $ex) {
            echo $ex->getMessage();
        }
    }

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

        return redirect(route('user_page.edit', $id))->with('message', __('label.edit_sussess'));
    }

    public function listFollow($id)
    {
        $user = $this->user->findOrFail($id);

        return view('fontend.follows.listfollow', compact('user'));
    }

    public function userFollow($id)
    {
        $user = $this->user->findOrFail($id);

        return view('fontend.follows.userfollow', compact('user'));
    }

    public function followUser($id)
    {
        $user = User::findOrFail($id);
        if (!$user) {

            return redirect()->back()->with('error', trans('province.error'));
        }
        $user->followers()->attach(auth()->user()->id);
        event(new FollowEvent(trans('province.hasFollow') . auth()->user()->name));

        return redirect()->back()->with('success', trans('province.success'));
    }

    public function unFollowUser($id)
    {
        $user = User::findOrFail($id);
        if (!$user) {

            return redirect()->back()->with('error', trans('province.error'));
        }
        $user->followers()->detach(auth()->user()->id);

        return redirect()->back()->with('success', trans('province.success'));
    }
}
