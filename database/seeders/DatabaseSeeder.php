<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $faker = Faker::create();

        // Generate 25 products
        for ($i = 0; $i < 25; $i++) {
            DB::table('products')->insert([
                'name' => $faker->word,
                'quantity' => $faker->numberBetween(1, 100),
                'price' => $faker->randomFloat(2, 1, 1000),
                'description' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}