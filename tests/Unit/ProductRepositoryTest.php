<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Repositories\ProductRepository;
use PHPUnit\Framework\TestCase;
use Mockery as m;

class ProductRepositoryTest extends TestCase
{
    protected $mockproduct;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();

        $this->mockproduct = m::mock(ProductRepository::class)->makePartial();
    }

    public function test_getAll(){

        $this->mockproduct
            ->shouldReceive('getAll')->once()
            ->andReturn(1);

        $result = $this->mockproduct->getAll();
        $this->assertEquals(1,$result);
    }

    public function test_store(){
        $product = [
            'category_id' => '1',
            'name' => 'product test',
            'gallery' => \Illuminate\Http\UploadedFile::fake()->image('gallery.jpg'),
            'quantity' => 100,
            'price' => '2000.000',
            'description' => 'description test'
        ];

        $this->mockproduct->shouldReceive('create')->once()->andReturn(new Product($product));
        $result = $this->mockproduct->create($product);
        $this->assertEquals(new Product($product),$result);
    }

    public function test_show(){
        $product = [
            'category_id' => '1',
            'name' => 'product test',
            'gallery' => \Illuminate\Http\UploadedFile::fake()->image('gallery.jpg'),
            'quantity' => 100,
            'price' => '2000.000',
            'description' => 'description test'
        ];
        $this->mockproduct->shouldReceive('show')->once()->andReturn($product);
        $resulf = $this->mockproduct->show($product['id']);
        $this->assertEquals($product,$resulf);
    }

    public function test_update(){
        $product = [
            'id' => 1,
            'category_id' => '1',
            'name' => 'product test',
            'gallery' => \Illuminate\Http\UploadedFile::fake()->image('gallery.jpg'),
            'quantity' => 100,
            'price' => '2000.000',
            'description' => 'description test'
        ];
        $id = 1;
        $input =  [
            'name' => 'product test update',
            'gallery' => \Illuminate\Http\UploadedFile::fake()->image('gallery.jpg'),
            'quantity' => 100,
            'price' => '2000.000',
            'description' => 'description test'
        ];
        $this->mockproduct->shouldReceive('update')->once()->andReturn($input);
        $products = $this->mockproduct->update($product[$id],$input);
        $this->assertEquals($input, $products);
    }

    public function test_delete(){
        $id = 1;
        $this->mockproduct->shouldReceive('delete')->once()->andReturn('success');
        $resulf = $this->mockproduct->delete($id);
        $this->assertEquals('success',$resulf);
    }
}
