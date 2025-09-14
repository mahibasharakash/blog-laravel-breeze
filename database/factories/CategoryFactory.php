<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    protected static array $categories = [
        'electronics',
        'clothing',
        'home',
        'goods',
        'books',
        'groceries',
        'health & beauty',
        'sports & outdoors',
        'toys & games',
        'automotive',
        'education',
        'pets',
        'furniture',
        'jewelry',
    ];

    public function definition(): array
    {

        $category = array_pop(static::$categories);

        return [
            'name' => $category,
            'slug' => str($category)->slug(),
        ];
    }
}
