<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\models\Product;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ProductRepository.
 */
class ProductRepository extends EloquentRepository
{
    protected $productRepository;
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
       return Product::class;
    }

    /**
     * @inheritDoc
     */
    public function getModel()
    {
        return Product::class;
    }
}
