<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Http\Requests\MoneyRequest;
use Illuminate\Support\Facades\Auth;

class RechargeController extends Controller
{
    public function in($id)
    {
        $rc = Wallet::findOrFail($id);
        $id = Auth::user()->id;
        
        return view('fontend.recharge.recharge', ['rc' => $rc, 'id' => $id]);
    }

    public function postin(Request $request, $id)
    {
        $rc = Wallet::findOrFail($id);
        $old = $rc->balance;
        $new = $request->balance;
        $rc->balance = $old + $new;
        $rc->save();

        return redirect('/')->with('noti', 'success');
    }
}
