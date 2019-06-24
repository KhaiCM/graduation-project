<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Statistic;
use App\Models\Province;
use App\Models\PropertyCategory;

class DashBoardController extends Controller
{
	private $month;
	private $year;

	public function __construct()
	{
		$this->month = (int) now()->format('n');
		$this->year = (int) now()->format('Y');
	}

	public function index()
	{
		$ids = Statistic::selectRaw('object_type, object_id, sum(count) as s_count')
			->groupBy('object_type', 'object_id')
			->where('type', Statistic::TYPE_SEARCH)
			->where('object_type', Province::class)
			->where(function ($q) {
				$q->where(function ($q) {
					$q->where('month', '>=', $this->month)
					->where('year', $this->year - 1);
				})
				->orWhere(function ($q) {
					$q->where('month', '<', $this->month)
					->where('year', $this->year);
				});
			})
			->orderBy('s_count', 'desc')
			->limit(5)->get()->pluck('object_id');

		$statistic_data = Statistic::with('object')->where('type', Statistic::TYPE_SEARCH)
			->where('object_type', Province::class)
			->whereIn('object_id', $ids)
			->where(function ($q) {
				$q->where(function ($q) {
					$q->where('month', '>=', $this->month)
					->where('year', $this->year - 1);
				})
				->orWhere(function ($q) {
					$q->where('month', '<', $this->month)
					->where('year', $this->year);
				});
			})
			->orderBy('year', 'asc')
			->orderBy('month', 'asc')
			->orderBy('object_id', 'asc')
			->get();

		$provinces = $statistic_data->pluck('object')->unique('id')->sortBy('id');
		$province_statistics[0] = ['Months'];
		foreach ($provinces as $province) {
			$province_statistics[0][] = $province['name'];
		}

		$years = [
			($this->year - 1) => [
				'start' => $this->month,
				'end' => 12,
			],
		];

		if ($this->month > 1) {
			$years[$this->year] = [
				'start' => 1,
				'end' => $this->month - 1
			];
		}

		foreach ($years as $year => $time) {
			for ($i = $time['start']; $i <= $time['end']; $i++) {
				$month = $i . '/' . $year;
				$province_statistics[$month][] = $month;
				foreach ($provinces as $province) {
					$month_data = $statistic_data->where('object_id', $province->id)->where('month', $i)->where('year', $year)->first();
					$province_statistics[$month][] = is_null($month_data) ? 0 : $month_data->count;
				}
			}
		}


		$ids = Statistic::selectRaw('object_type, object_id, sum(count) as s_count')
			->groupBy('object_type', 'object_id')
			->where('type', Statistic::TYPE_SEARCH)
			->where('object_type', PropertyCategory::class)
			->where(function ($q) {
				$q->where(function ($q) {
					$q->where('month', '>=', $this->month)
					->where('year', $this->year - 1);
				})
				->orWhere(function ($q) {
					$q->where('month', '<', $this->month)
					->where('year', $this->year);
				});
			})
			->orderBy('s_count', 'desc')
			->limit(5)->get()->pluck('object_id');

		$statistic_data = Statistic::with('object')->where('type', Statistic::TYPE_SEARCH)
			->where('object_type', PropertyCategory::class)
			->whereIn('object_id', $ids)
			->where(function ($q) {
				$q->where(function ($q) {
					$q->where('month', '>=', $this->month)
					->where('year', $this->year - 1);
				})
				->orWhere(function ($q) {
					$q->where('month', '<', $this->month)
					->where('year', $this->year);
				});
			})
			->orderBy('year', 'asc')
			->orderBy('month', 'asc')
			->orderBy('object_id', 'asc')
			->get();

		$property_categories = $statistic_data->pluck('object')->unique('id')->sortBy('id');
		$property_category_statistics[0] = ['Months'];
		foreach ($property_categories as $province) {
			$property_category_statistics[0][] = $province['name'];
		}

		$years = [
			($this->year - 1) => [
				'start' => $this->month,
				'end' => 12,
			],
		];

		if ($this->month > 1) {
			$years[$this->year] = [
				'start' => 1,
				'end' => $this->month - 1
			];
		}

		foreach ($years as $year => $time) {
			for ($i = $time['start']; $i <= $time['end']; $i++) {
				$month = $i . '/' . $year;
				$property_category_statistics[$month][] = $month;
				foreach ($property_categories as $province) {
					$month_data = $statistic_data->where('object_id', $province->id)->where('month', $i)->where('year', $year)->first();
					$property_category_statistics[$month][] = is_null($month_data) ? 0 : $month_data->count;
				}
			}
		}

		return view('backend.dashboard.show', compact('province_statistics', 'property_category_statistics'));
	}
}
