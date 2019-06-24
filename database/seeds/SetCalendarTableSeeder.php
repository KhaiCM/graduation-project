<?php

use Illuminate\Database\Seeder;

class SetCalendarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\SetCalendar::class, 1000)->create();
    }
}
