<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\SetCalendar;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Notifications\CalendarNotification;
use App\Notifications\CalendarPropertyOwnerNotification;
use App\Http\Requests\CalendarFormRequest;

class SetCalenderController extends Controller
{

    public function create($id)
    {
        $sc = Property::findOrFail($id);
        $setCalendar = SetCalendar::where('properties_id', $id)->get()->toArray();
        $user = Auth::user()->id;
        if ($user == $sc->users->id)
        {
            return Redirect::back()->with('noti', trans('label.cannot'));

        } elseif ($setCalendar[0]['user_id'] == Auth::user()->id) {

            return Redirect::back()->with('noti', trans('label.cannotbeset'));

        } else {

            return view('fontend.calendars.set_calendar', ['sc' => $sc]);
        }
    }

    public function postcreate(Request $request, $id)
    {

        $property = Property::with('users')->findOrFail($id);

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
        $sc->properties_id = $id;
        $sc->user_id = $user;

        $sc->save();
        auth()->user()->notify(new CalendarNotification($sc, $property));
        $property->users->notify(new CalendarPropertyOwnerNotification($sc, $property));

        return redirect('/')->with('noti', 'success');
    }

    public function getList()
    {
        $sc = SetCalendar::paginate(config('app.contract_page'));
        // dd($sc);
        return view('backend.setcalendars.show', ['sc' => $sc]);
    }

    public function getDelete($id)
    {
        $sc = SetCalendar::findOrFail($id);
        $sc->delete();

        return redirect('listcalendars')->with('noti', 'success');
    }

    public function getDetail($id)
    {
        $sc = SetCalendar::findOrFail($id);
        
        return view('backend.setcalendars.detail', ['sc' => $sc]);
    }

    public function getMyCalendar()
    {
        $calendar = SetCalendar::where('user_id', Auth::user()->id)->get();
        return view('fontend.calendars.my_calendar', compact('calendar'));
    }

    public function editMyCalendar($id)
    {
        $sc = SetCalendar::findOrFail($id);
        // dd($sc);
        return view('fontend.calendars.edit_mycalendar', compact('sc'));
    }

    public function updateMyCalendar(CalendarFormRequest $request, $id)
    {
        $sc = SetCalendar::findOrFail($id);
        $validated = $request->validated();
        $sc->update([
            'name' => $request->get('name'),
            'properties_id' => $request->properties_id,
            'date' => $request->date,
            'time' => $request->time,
            'note' => $request->note,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        return redirect(route('myCalendar.show'))->with('noti', 'success');
    }

    public function deleteMyCalendar($id)
    {
        $sc = setCalendar::findOrFail($id);
        $sc->delete();
        return redirect(route('myCalendar.show'))->with('noti', 'success');
    }
}
