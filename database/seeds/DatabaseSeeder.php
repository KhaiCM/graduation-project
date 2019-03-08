<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ProvinceTableSeeder::class);
        $this->call(CategoryPostTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(SetCalendarTableSeeder::class);
        $this->call(PropertyCategoryTableSeeder::class);
        $this->call(PropertyTableSeeder::class);
        $this->call(UnitTableSeeder::class);
    }
}
