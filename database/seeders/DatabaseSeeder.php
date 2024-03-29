<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            regionalSeeder::class,
            unitSubSeeder::class,
            isoSeeder::class,
            nilaiSeeder::class,
            divisiSeeder::class,
            departemenSeeder::class,
            roleSeeder::class,
            userSeeder::class,
            // RoleSeeder::class,
            // UserSeeder::class,
            // UnitkerjaSeeder::class,
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
