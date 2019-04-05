<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentContract;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\ContractRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ContractController extends Controller
{
    public function getList()
    {
        $ct = RentContract::paginate(config('app.contract_page'));
        
        return view('backend.contract.showcontract', ['ct' => $ct]);
    }
    public function create($id)
    {
        
        $ct = Property::findOrFail($id);
        $user = Auth::user()->id;
        if ($user == $ct->users->id)
        {
            return Redirect::back()->with('noti', trans('message.cannot'));
        } else {
            return view('fontend.contract.contract', ['ct' => $ct]);
        }
    }

    public function postcreate(Request $request, $id)
    {
        $ct = RentContract::create($request->all());

        return redirect('/')->with('noti', 'success');
    }
    public function getDetail($id)
    {     
        $ct = RentContract::findOrFail($id);
        
        return view('backend.contract.detail', ['ct' => $ct]);
    }
}
