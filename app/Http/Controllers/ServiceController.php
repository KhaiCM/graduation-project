<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Wallet;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class ServiceController extends Controller
{
    public function in($id)
    {
        $sv = Service::all();
        $id = Auth::user()->id;
        
        return view('fontend.service.service', ['sv' => $sv, 'id' => $id]);
    }

    public function postIn(Request $request, $id)
    {
        $rc = Wallet::findOrFail($id);
        $user = User::findOrFail($rc->id);
   
        if($request->service == 1 && $user->wallet->balance >= 10000) 
        {
            $old = $rc->balance;
            $rc->balance = $old - 10000;

            $rc->save();

            return redirect('/')->with('noti', 'success');
        }
        else if($request->service == 1 && $user->wallet->balance < 10000) 
        {
            return Redirect::back()->with('noti', trans('message.cannot'));
        }
        else if($request->service == 2 && $user->wallet->balance >= 30000)
        {
            $old = $rc->balance;
            $rc->balance = $old - 30000;

            $rc->save();

            return redirect('/')->with('noti', 'success');
        }
        else if($request->service == 2 && $user->wallet->balance < 30000) 
        {
            return Redirect::back()->with('noti', trans('message.cannot'));
        }
    }
}
