<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Petition;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'wowmeww',
            'email' => 'nicobernardfirmanes@gmail.com',
            'password' => 'password'
        ]);
        $authors = Author::factory(20)->create();
        $authors->each(function ($autor) {
            Petition::factory()->create([
                'author' => $autor->name
            ]);
        });
    }
}
