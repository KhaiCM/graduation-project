<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

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
}
