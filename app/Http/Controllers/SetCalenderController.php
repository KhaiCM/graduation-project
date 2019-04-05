<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\SetCalendar;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class SetCalenderController extends Controller
{

    public function create($id)
    {
        $sc = Property::findOrFail($id);
        $user = Auth::user()->id;
        if ($user == $sc->users->id)
        {
            return Redirect::back()->with('noti', trans('cannot'));
        } else {
            return view('fontend.calendars.set_calendar', ['sc' => $sc]);
        }
    }

    public function postcreate(Request $request, $id)
    {
        try 
        {
            $sc = Property::findOrFail($id);
        } 
        catch (ModelNotFoundException $e)
        {
            echo $e->getMessage();
        }
        $this->validate($request,
        [
            'note' => 'required|min:3|max:100',
            'phone' => 'required',
        ],
        [
            'note.required' => trans('message.cannotblank'),
            'note.min' => trans('message.tooshort'),
            'note.max' => trans('message.toolong'),
            'phone.required' => trans('message.cannotblank'),
        ]);
        
        $user = Auth::user()->id;
        

        $sc = new SetCalendar;
        $sc->date = $request->date;
        $sc->time = $request->time;
        $sc->email = $request->email;
        $sc->note = $request->note;
        $sc->phone = $request->phone;
        $sc->property_id = $id;

        $sc->save();

        return redirect('/')->with('noti', 'success');
    }

    public function getList()
    {
        $sc = SetCalendar::paginate(config('app.contract_page'));
        
        return view('backend.setcalendars.show', ['sc' => $sc]);
    }

    public function getDelete($id)
    {
        $sc = SetCalendar::find($id);
        $sc->delete();

        return redirect('listcalendars')->with('noti', 'success');
    }

    public function getDetail($id)
    {
        $sc = SetCalendar::find($id);
        
        return view('backend.setcalendars.detail', ['sc' => $sc]);
    }
}
