<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RechargeController extends Controller
{
    public function in()
    {
        return view('fontend.recharge.recharge');
    }
}
