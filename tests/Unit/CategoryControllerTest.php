<?php

namespace Tests\Unit;

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Repositories\CategoriesRepository;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\App;
use PHPUnit\Framework\TestCase;
use Mockery as m;
use function GuzzleHttp\Promise\all;

class CategoryControllerTest extends TestCase
{
    protected $categoryController;
    /**
     * @var m\Mock
     */
    protected $mockcategory;
    /**
     * @var string
     */
    protected $categoryRepository = CategoriesRepository::class;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp(): void
    {

        $this->mockcategory = m::mock(CategoriesRepository::class)->makePartial();
        $this->categoryController = new CategoryController();
        parent::setUp();
    }

    public function test_return_view_create()
    {
        $view = $this->categoryController->create();
        $this->assertEquals('template.category.create', $view->getContent());
    }
}
