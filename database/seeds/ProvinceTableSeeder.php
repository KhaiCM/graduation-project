<?php

use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Province::class, 64)->create()->each(function ($province)
        {
        	$province->districts()->saveMany(factory(App\Models\District::class, rand(1, 10))->create([
                'provinces_id' => $province->id
            ]));
        });
    }
}
