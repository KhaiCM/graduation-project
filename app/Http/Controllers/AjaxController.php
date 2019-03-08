<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\District;

class AjaxController extends Controller
{
    public function getDistrict($province_id, Request $request)
    {
        $district = District::where('provinces_id', $province_id)->get();
        $html = '';
        foreach($district as $item) {
            $html .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }

        return $html;
    }
    public function getPropertyType($property_category_id, Request $request)
    {
        $property_type = PropertyType::where('property_category_id', $property_category_id)->get();
        $html = '';
        foreach($property_type as $item) {
            $html .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        
        return $html;
    }
}
