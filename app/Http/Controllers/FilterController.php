<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Statistic;
use App\Models\Property;
use App\Models\District;
use App\Models\PropertyType;

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        $province = ($request->has('province') ? $request->get('province') : false);
        $district = ($request->has('district') ? $request->get('district') : '');
        $property_category = ($request->has('property_category') ? $request->get('property_category') : false);
        $property_type = ($request->has('property_type') ? $request->get('property_type') : '');
        $acreage = ($request->has('acreage') ? $request->get('acreage') : false);
        $price = ($request->has('price') ? $request->get('price') : false);
        $form = ($request->has('form') ? $request->get('form') : false);

        $this_month = (int) now()->format('n');
        $this_year = (int) now()->format('Y');
        $query = Property::
            join('property_types', 'property_types.id', '=', 'properties.property_type_id')
            ->join('districts', 'districts.id', '=', 'properties.district_id')
            ->select('properties.id', 'properties.name as property_name', 'properties.user_id', 'properties.created_at', 'address', 'describe', 'image', 'acreage', 'price', 'districts.name', 'property_types.name')
            ->with('users');
        if ($request->has('district') && $request->district != 0) {
            $district = District::with([
                'provinces' => function ($q) {
                    $q->with([
                        'searchStatistics'=> function ($q) {
                            $q->orderBy('year', 'desc')->orderBy('month', 'desc')->limit(1);
                        }
                    ]);
                },
                'searchStatistics' => function ($q) {
                    $q->orderBy('year', 'desc')->orderBy('month', 'desc')->limit(1);
                },
            ])->findOrFail($request->district);
            $statistic = $district->searchStatistics->first();
            if (is_null($statistic) || $statistic->year != $this_year || $statistic->month != $this_month) {
                $district->searchStatistics()->create([
                    'type' => Statistic::TYPE_SEARCH,
                    'count' => 1,
                    'month' => $this_month,
                    'year' => $this_year,
                ]);
            } else {
                $district->searchStatistics()
                    ->where('month', $this_month)
                    ->where('year', $this_year)
                    ->update([
                    'count' => DB::raw('count + 1'),
                ]);
            }
            $province_statistic = $district->provinces->searchStatistics->first();
            if (is_null($province_statistic) || $province_statistic->year != $this_year || $province_statistic->month != $this_month) {
                $district->provinces->searchStatistics()->create([
                    'type' => Statistic::TYPE_SEARCH,
                    'count' => 1,
                    'month' => $this_month,
                    'year' => $this_year,
                ]);
            } else {
                $district->provinces->searchStatistics()
                    ->where('month', $this_month)
                    ->where('year', $this_year)
                    ->update([
                    'count' => DB::raw('count + 1'),
                ]);
            }
            $query->where('districts.id', $request->district);
        }

        if ($request->has('property_type') && $request->property_type != 0) {
            $property_type = PropertyType::with([
                'propertyCategory' => function ($q) {
                    $q->with([
                        'searchStatistics'=> function ($q) {
                            $q->orderBy('year', 'desc')->orderBy('month', 'desc')->limit(1);
                        }
                    ]);
                },
                'searchStatistics' => function ($q) {
                    $q->orderBy('year', 'desc')->orderBy('month', 'desc')->limit(1);
                },
            ])->findOrFail($request->property_type);
            $statistic = $property_type->searchStatistics->first();
            if (is_null($statistic) || $statistic->year != $this_year || $statistic->month != $this_month) {
                $property_type->searchStatistics()->create([
                    'type' => Statistic::TYPE_SEARCH,
                    'count' => 1,
                    'month' => $this_month,
                    'year' => $this_year,
                ]);
            } else {
                $property_type->searchStatistics()
                    ->where('month', $this_month)
                    ->where('year', $this_year)
                    ->update([
                    'count' => DB::raw('count + 1'),
                ]);
            }
            $property_category_statistic = $property_type->propertyCategory->searchStatistics->first();
            if (is_null($property_category_statistic) || $property_category_statistic->year != $this_year || $property_category_statistic->month != $this_month) {
                $property_type->propertyCategory->searchStatistics()->create([
                    'type' => Statistic::TYPE_SEARCH,
                    'count' => 1,
                    'month' => $this_month,
                    'year' => $this_year,
                ]);
            } else {
                $property_type->propertyCategory->searchStatistics()
                    ->where('month', $this_month)
                    ->where('year', $this_year)
                    ->update([
                    'count' => DB::raw('count + 1'),
                ]);
            }
            $query->where('property_types.id', $request->get('property_type'));
        }

        if ($request->has('acreage') && $request->acreage != 0) {
            $query = queryFilter($query, 'properties.acreage', config('search.acreage'), $request->get('acreage'));
        }

        if ($request->has('price') && $request->price != 0) {
            $query = queryFilter($query, 'properties.price', config('search.price'), $request->get('price'));
        }

        if ($request->has('form') && $request->form != 2) {
            $query->where('properties.form', $request->get('form'));
        }
        $filter = $query->get();

        return view('fontend.homepages.filter', compact('filter'));
    }
}

