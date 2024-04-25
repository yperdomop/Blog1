<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    User::create([
      'name' => 'yadir perdomo',
      'email' => 'yadir@gmail.com',
      'password' => bcrypt('7725908')
    ])->assignRole('Admin');
    User::factory(99)->create();
  }
}
