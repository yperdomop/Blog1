<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;


class DatabaseSeeder extends Seeder
{

  public function run(): void
  {
    //elimina las imagenes que estan en la carpeta public-storage-posts y las crea de nuevo
    Storage::deleteDirectory('posts');
    Storage::makeDirectory('posts');

    $this->call(UserSeeder::class);
    Category::factory(4)->create();
    Tag::factory(8)->create();
    $this->call(PostSeeder::class);
  }
}
