<?php

use Illuminate\Database\Seeder;

class PropertyCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\PropertyCategory::class, 10)->create();
    }
}
