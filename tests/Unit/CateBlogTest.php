<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\CategoryPost;

class CateBlogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCateBlogCreate()
    {
        $cate = factory(CategoryPost::class)->create();
        $this->assertInstanceOf(CategoryPost::class, $cate);
        $this->assertDatabaseHas('category_posts', [
            'name' => $cate->name,
        ]);
    }

    public function testShowCategory()
    {
        $cate = factory(CategoryPost::class)->create();
        $this->assertInstanceOf(CategoryPost::class, $cate);
        $found = CategoryPost::findOrFail($cate->id);
        $this->assertEquals($found->name, $cate->name);
    }

    public function testCateBlogUpdate()
    {
        $cate = factory(CategoryPost::class)->create();        
        $data = [
            'name' => 'Ha Noi',
        ];
        $this->assertInstanceOf(CategoryPost::class, $cate);
        $cate = CategoryPost::findOrFail($cate->id);
        $success = $cate->update($data);
        $this->assertTrue($success);
        $this->assertDatabaseHas('category_posts', [
            'name' => $data['name'],
        ]);
    }

    public function testCateBlogDelete()
    {
        $cate = factory(CategoryPost::class)->create();
        $success = $cate->delete();
        $this->assertTrue($success);
        $this->assertDatabaseMissing('category_posts', [
            'name' => $cate->name,
        ]);
    }
}
