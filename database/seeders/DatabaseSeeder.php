<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // https://fakerphp.org/
        User::factory()->create([
            'name' => 'Francesco',
            'email' => 'fra.mansi@gmail.com',
            'is_admin' => true,
        ]);

        //User::factory(100)->create();
        Book::factory(1000)->create();
    }
}
