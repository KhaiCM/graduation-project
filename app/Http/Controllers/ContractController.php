<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentContract;
use App\Models\Property;
use App\Models\User;

class ContractController extends Controller
{
    public function getList()
    {
        $ct = RentContract::paginate(config('app.contract_page'));
        
        return view('backend.contract.showcontract', ['ct' => $ct]);
    }
}
