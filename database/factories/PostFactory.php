<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class PostFactory extends Factory
{
    protected $model= Post::class;
    
    public function definition(): array
    {
        $name= $this->faker->unique()->sentence();
        
        return [
           'name'=>$name,
           'slug'=>Str::slug($name),
           'extract'=> $this->faker->text(250),
           'body'=> $this->faker->text(2000),
           'status'=> $this->faker->randomElement([1,2]),
           'category_id'=> Category::all()->random()->id,
           'user_id'=>User::all()->random()->id,
        ];
    }
}
