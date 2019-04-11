<?php

namespace Tests\Unit\Http\Controllers\Admin;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use App\Repositories\PropertyCategoryRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PropertyCategoryControllerTest extends TestCase
{
    public function testPropertyCategoryCreate()
    {
        $name = 'test';
        $request = [
            'name' => $name,
        ];
        $property_category = $this->post(route('propertycat.create'), $request)->assertStatus(302);
    }

    public function testPropertyCategoryUpdate()
    {
        $propertyCategory = factory(PropertyCategory::class)->create();        
        
        $name = 'update';
        $data = [
            'name' => $name,
        ];
        $this->post(route('procat.update', $propertyCategory->id), $data)->assertStatus(302);
        $procat = PropertyCategory::findOrFail($propertyCategory->id);
        $update = $procat->update($data);
        $this->assertTrue($update);
        $this->assertEquals($data['name'], $procat->name);

    }

    public function testPropertyCategorIndex()
    {
        $propertyCategory = factory(PropertyCategory::class)->create();
        $this->assertInstanceOf(PropertyCategory::class, $propertyCategory);
        $data = PropertyCategory::findOrFail($propertyCategory->id);
        $this->assertEquals($data->name, $propertyCategory->name);
    }

    public function testPropertyCategorDelete()
    {
        $propertyCategory = factory(PropertyCategory::class)->create();
        $this->get(route('procat.destroy', $propertyCategory->id))->assertStatus(302);

    }
}
