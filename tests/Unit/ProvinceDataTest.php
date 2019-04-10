<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Province;

class ProvinceDataTest extends TestCase
{
    public function testProvinceCreate()
    {
        $province = factory(Province::class)->create();
        $this->assertInstanceOf(Province::class, $province);
        $this->assertDatabaseHas('provinces', [
            'name' => $province->name,
        ]);
    }

    public function testShowCategory()
    {
        $province = factory(Province::class)->create();
        $this->assertInstanceOf(Province::class, $province);
        $found = Province::findOrFail($province->id);
        $this->assertEquals($found->name, $province->name);
    }

    public function testProvinceUpdate()
    {
        $province = factory(Province::class)->create();        
        $data = [
            'name' => 'Ha Noi',
        ];
        $this->assertInstanceOf(Province::class, $province);
        $province = Province::findOrFail($province->id);
        $success = $province->update($data);
        $this->assertTrue($success);
        $this->assertDatabaseHas('provinces', [
            'name' => $data['name'],
        ]);
    }

    public function testProvinceDelete()
    {
        $province = factory(Province::class)->create();
        $success = $province->delete();
        $this->assertTrue($success);
        $this->assertDatabaseMissing('provinces', [
            'name' => $province->name,
        ]);
    }
}
