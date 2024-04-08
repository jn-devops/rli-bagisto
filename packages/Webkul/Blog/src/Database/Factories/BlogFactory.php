<?php

namespace Webkul\Blog\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Webkul\Blog\Models\Blog;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    }
}
