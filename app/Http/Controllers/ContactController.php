<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Unit;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function getList()
    {
        $ct = Contact::paginate(config('app.contract_page'));
        
        return view('backend.contact.showcontact', ['ct' => $ct]);
    }

    public function getDeleteContact($id)
    {
        $ct = Contact::find($id);
        $ct->delete();

        return redirect('/')->with('noti', 'success');
    }
    public function create()
    {
        return view('fontend.contact.contact');
    }

    public function postCreate(ContactRequest $request)
    {
        $ct = Contact::create($request->all());

        return redirect('/')->with('noti', 'success');
    }
}
