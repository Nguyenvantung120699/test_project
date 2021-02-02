<?php

namespace App\Repositories;

use App\Models\Category;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class CategoriesRepository.
 */
class CategoriesRepository extends EloquentRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function getModel()
    {
        return Category::class;
    }

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Category::class;
    }

    public function find($id)
    {
        return Category::find($id);
    }
}
