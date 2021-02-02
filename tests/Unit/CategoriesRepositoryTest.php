<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Repositories\CategoriesRepository;
use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\TestCase;
use Mockery as m;

class CategoriesRepositoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected $mockcategory;
    protected $categoryController;
    protected $category;

    public function setUp() : void
    {
        $this->mockcategory = m::mock(CategoriesRepository::class)->makePartial();
        parent::setUp();
    }

    public function test_getAll(){

        $this->mockcategory
            ->shouldReceive('getAll')->once()
            ->andReturn(1);

        $result = $this->mockcategory->getAll();
        $this->assertEquals(1,$result);
    }

    public function test_store(){
        $category = [
                'name' => 'Name 1',
                'logo' => \Illuminate\Http\UploadedFile::fake()->image('logo.jpg'),
                'description' => 'description test'
            ];

        $this->mockcategory->shouldReceive('create')->once()->andReturn(new Category($category));
        $result = $this->mockcategory->create($category);
        $this->assertEquals(new Category($category),$result);
    }

    public function test_show(){
        $category = [
            'id' => 1,
            'name' => 'Name 1',
            'logo' => \Illuminate\Http\UploadedFile::fake()->image('logo.jpg'),
            'description' => 'description test'
        ];
        $this->mockcategory->shouldReceive('show')->once()->andReturn($category);
        $resulf = $this->mockcategory->show($category['id']);
        $this->assertEquals($category,$resulf);
    }

    public function test_update(){
        $input = [
            'id' => 1,
            'name' => 'Name update',
            'logo' => \Illuminate\Http\UploadedFile::fake()->image('logo.jpg'),
            'description' => 'description test'
        ];
        $this->mockcategory->shouldReceive('update')->once()->andReturn('yes');
        $categorys = $this->mockcategory->update($input['id'],$input);
        $this->assertEquals('yes', $categorys);
    }

    public function test_delete(){
        $id = 1;
        $this->mockcategory->shouldReceive('delete')->once()->andReturn('success');
        $resulf = $this->mockcategory->delete($id);
        $this->assertEquals('success',$resulf);
    }
}
