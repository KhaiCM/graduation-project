<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\District;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyImage;
use App\Models\PropertyType;
use App\Models\Province;
use App\Models\Unit;
use App\Models\Service;
use App\Models\Wallet;
use App\Models\User;
use App\Repositories\PropertyImageRepository;
use App\Repositories\PropertyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class PropertyController extends Controller
{
    protected $province;

    public function __construct(PropertyRepository $properties, PropertyImageRepository $image)
    {
        $this->property = $properties;
        $this->property_image = $image;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $unit = Unit::all();

        $province = Province::all();

        $district = District::all();

        $propertyCategory = PropertyCategory::all();

        $propertyType = PropertyType::all();

        $sv = Service::all();

        $cb = Carbon::now();

        return view('fontend.properties.property_submit', compact('user', 'province', 'district', 'propertyCategory', 'propertyType', 'unit', 'sv', 'cb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        $id = Auth::user()->id; //id user
        $rc = Wallet::findOrFail($id);  //id wallet
        $user = User::findOrFail($rc->id);
        if ($request->service == null)
        {
            if ($request->hasFile('file'))
            {
                $img = null;
                $property_image = [];
                foreach ($request->file('file') as $item) 
                {
                    $name = $item->getClientOriginalName();
                    $image = str_random(5) . $name;
                    while (file_exists('upload/property' . $image)) {
                        $image = str_random(5) . '.' . $image;
                    }
                    $item->move(config('app.property_path'), $image);
                    if (is_null($img)) {
                        $img = $image;
                    }
                    $property_image [] = $image;
                }
                $request->merge([
                    'status' => 0,
                    'user_id' => $request->user()->id,
                    'image' => $img,
                ]);
                $properties = $this->property->create($request->all());
                
                foreach ($property_image as $item) 
                {
                    $file = [
                        'property_id' => $properties->id,
                        'link' => $item,
                    ];
                    $image = $this->property_image->create($file);
                }
            }
                return redirect('property')->with('message', __('message.add_property'));
        } elseif ($request->service == 1 && $user->wallet->balance >= 10000) {
            $old = $rc->balance;
            $rc->balance = $old - 10000;
            $rc->save(); 
            if ($request->hasFile('file'))
            {
                $img = null;
                $property_image = [];
                foreach ($request->file('file') as $item) 
                {
                    $name = $item->getClientOriginalName();
                    $image = str_random(5) . $name;
                    while (file_exists('upload/property' . $image)) {
                        $image = str_random(5) . '.' . $image;
                    }
                    $item->move(config('app.property_path'), $image);
                    if (is_null($img)) {
                        $img = $image;
                    }
                    $property_image [] = $image;
                }
                $request->merge([
                    'status' => 0,
                    'user_id' => $request->user()->id,
                    'image' => $img,
                    'end_date' => Carbon::now()->addDays(10)->toDateString(),
                ]);
                $properties = $this->property->create($request->all());
                
                foreach ($property_image as $item) 
                {
                    $file = [
                        'property_id' => $properties->id,
                        'link' => $item,
                    ];
                    $image = $this->property_image->create($file);
                }
            }
            return redirect('property')->with('message', __('message.add_property'));
        } elseif ($request->service == 1 && $user->wallet->balance < 10000) {
            return Redirect::back()->with('noti', trans('message.cannot'));
        } elseif($request->service == 2 && $user->wallet->balance >= 30000) {
            $old = $rc->balance;
            $rc->balance = $old - 30000;
            $rc->save();
            if ($request->hasFile('file'))
            {
                $img = null;
                $property_image = [];
                foreach ($request->file('file') as $item) 
                {
                    $name = $item->getClientOriginalName();
                    $image = str_random(5) . $name;
                    while (file_exists('upload/property' . $image)) {
                        $image = str_random(5) . '.' . $image;
                    }
                    $item->move(config('app.property_path'), $image);
                    if (is_null($img)) {
                        $img = $image;
                    }
                    $property_image [] = $image;
                }
                $request->merge([
                    'status' => 0,
                    'user_id' => $request->user()->id,
                    'image' => $img,
                    'end_date' => Carbon::now()->addDays(30)->toDateString(),
                ]);
                $properties = $this->property->create($request->all());
                foreach ($property_image as $item) 
                {
                    $file = [
                        'property_id' => $properties->id,
                        'link' => $item,
                    ];
                    $image = $this->property_image->create($file);
                }
            }
                return redirect('property')->with('message', __('message.add_property'));
        } elseif($request->service == 2 && $user->wallet->balance < 30000) {
            return Redirect::back()->with('noti', trans('message.cannot'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $properties = Property::with('propertyImage')->where('user_id', $id)->paginate(config('pagination.myProperty'));

            return view('fontend.properties.my_property', compact('properties'));
        } catch (ModelNotFoundException $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $properties = $this->property->findOrFail($id);

        $user = Auth::user();

        $unit = Unit::all();

        $province = Province::all();

        $district = District::all();

        $propertyCategory = PropertyCategory::all();

        $propertyType = PropertyType::all();

        return view('fontend.properties.edit_property', compact('properties', 'user', 'unit', 'province', 'district', 'propertyCategory', 'propertyType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, $id)
    {
        try
        {
            $request->merge([
                'status' => 0,
                'user_id' => $request->user()->id,
            ]);
            $properties = $this->property->update($id, $request->all());
            $file = [];
            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $item) {
                    $name = $item->getClientOriginalName();
                    $image = str_random(5) . $name;
                    while (file_exists('upload/property' . $image)) {
                        $image = str_random(5) . '.' . $name;
                    }
                    $item->move(config('app.property_path'), $image);
                    $propertyImage = PropertyImage::where('property_id', $id)->get();
                    foreach ($propertyImage as $item) {
                        if (file_exists(config('app.property_path') . $item->link)) {
                            unlink(config('app.property_path') . $item->link);
                        }
                    }
                    $file[] = new PropertyImage([
                        'link' => $image,
                    ]);
                }
                $property = $this->property->findOrFail($id);
                $property->propertyImage()->delete();
                $property->propertyImage()->saveMany($file);

                return redirect(route('property.show', $request->user()->id))->with('message', __('label.edit_sussess'));
            }
        } catch (ModelNotFoundException $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $property = $this->property->findOrFail($id);

            $propertyImage = PropertyImage::where('property_id', $id)->get();

            foreach ($propertyImage as $item) {
                if (file_exists(config('app.property_path') . $item->link)) {
                    unlink(config('app.property_path') . $item->link);
                }
            }
            $property->propertyImage()->delete();

            $properties = $this->property->delete($id);

            return redirect(route('property.show', Auth::user()->id));
        } catch (ModelNotFoundException $ex) {
            echo $ex->getMessage();
        }
    }
}

