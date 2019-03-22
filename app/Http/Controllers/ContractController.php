<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentContract;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\ContractRequest;

class ContractController extends Controller
{
    public function getList()
    {
        $ct = RentContract::paginate(config('app.contract_page'));
        
        return view('backend.contract.showcontract', ['ct' => $ct]);
    }
    public function create($id)
    {
        try 
        {
            $ct = Property::findOrFail($id);
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }

        return view('fontend.contract.contract', ['ct' => $ct]);
    }

    public function postcreate(Request $request, $id)
    {
        $ct = RentContract::create($request->all());

        return redirect('/')->with('noti', 'success');
    }
}
