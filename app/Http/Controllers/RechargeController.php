<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Http\Requests\MoneyRequest;

class RechargeController extends Controller
{
    public function in()
    {
        return view('fontend.recharge.recharge');
    }

    public function postin(MoneyRequest $request)
    {
        $mn = Wallet::create($request->all());

        return redirect('/')->with('noti', 'success');
    }
}
