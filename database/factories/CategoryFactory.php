<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Catch_;

class CategoryFactory extends Factory
{
    protected $model=Category::class;
    
    public function definition(): array
    {
        $name = $this->faker->unique()->word(20);

        return [
            'name'=> $name,
            'slug'=>Str::slug($name)
        ];
    }
}
