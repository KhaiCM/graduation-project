<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\District;
use App\Models\Province;

class DistrictDataTest extends TestCase
{
    public function testDistrictCreate()
    {
        $district = factory(District::class)->create();
        $this->assertInstanceOf(District::class, $district);
        $this->assertDatabaseHas('districts', [
            'name' => $district->name,
            'provinces_id' => $district->provinces_id,
        ]);
    }

    public function testShowCategory()
    {
        $district = factory(District::class)->create();
        $this->assertInstanceOf(District::class, $district);
        $found = District::findOrFail($district->id);
        $this->assertEquals($found->name, $district->name);
        $this->assertEquals($found->provinces_id, $district->provinces_id);
    }

    public function testDistrictUpdate()
    {
        $district = factory(District::class)->create();        
        $data = [
            'name' => 'Thanh Xuan',
        ];
        $this->assertInstanceOf(District::class, $district);
        $district = District::findOrFail($district->id);
        $success = $district->update($data);
        $this->assertTrue($success);
        $this->assertDatabaseHas('districts', [
            'name' => $data['name'],
            'provinces_id' => $district->provinces_id,
        ]);

        $data = [
            'provinces_id' => '24',
        ];
        $district = District::findOrFail($district->id);
        $success = $district->update($data);
        $this->assertTrue($success);
        $this->assertDatabaseHas('districts', [
            'name' => $district->name,
            'provinces_id' => $data['provinces_id'],
        ]);
    }

    public function testDistrictDelete()
    {
        $district = factory(District::class)->create();
        $this->assertInstanceOf(District::class, $district);
        $success = $district->delete();
        $this->assertTrue($success);
        $this->assertDatabaseMissing('districts', [
            'name' => $district->name,
            'provinces_id' => $district->provinces_id,
        ]);
    }
}
