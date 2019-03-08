<?php

use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            ['name' => 'Thỏa thuận'],
            ['name' => 'Triệu'],
            ['name' => 'Tỷ'],
            ['name' => 'Trăm nghìn/m2'],
            ['name' => 'Trăm nghìn/tháng'],
            ['name' => 'Triệu/tháng'],
            ['name' => 'Trăm nghìn/m2/tháng'],
            ['name' => 'Triệu/m2/tháng'],
            ['name' => 'Nghìn/m2/tháng'],
        ]);
    }
}
