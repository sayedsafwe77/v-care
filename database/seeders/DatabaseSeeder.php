<?php

namespace Database\Seeders;

use App\Models\User;
use PhpParser\Comment\Doc;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\DoctorTitle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
      $user = User::first();
      if(!isset($user))
      {
             User::factory()->create([
            'name' => 'abou',
            'email' => 'a@a.com',
        ]);
      }

    }
}
