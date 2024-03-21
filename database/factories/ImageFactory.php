<?php

namespace Database\Factories;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;


class ImageFactory extends Factory
{
    protected $model = Image::class;
   
    public function definition(): array
    {
        return [
            'url'=> 'posts/'. $this->faker->image('public/storage/posts', 640,480,null,false)//posts/imagen.jpg
        ];
    }
}
