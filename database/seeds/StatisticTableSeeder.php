<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatisticTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$statistic = [
    		'App\Models\Province' => range(1, 7),
    		'App\Models\District' => range(1, 5),
    		'App\Models\PropertyCategory' => range(1, 6),
    		'App\Models\PropertyType' => range(1, 5),
    	];
    	$months = range(1, 12);
    	$years = range(2009, 2019);
    	foreach ($statistic as $type => $items) {
    		foreach ($items as $item) {
	    		foreach ($years as $year) {
	    			foreach ($months as $month) {
	    				DB::table('statistics')->insert([
	    					'type' => 'search',
	    					'object_type' => $type,
	    					'object_id' => $item,
	    					'month' => $month,
	    					'year' => $year,
	    					'count' => mt_rand(99, 999)
	    				]);
	    			}
	    		}
    		}
    	}
    }
}
