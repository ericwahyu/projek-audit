<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users =[
            [
                'role_id' => 1,
                'name' => 'Fernanda',
                'username' => 'fernanda',
                'email' => 'fernanda@gmail.com',
                'password' => '$2a$12$OelajwmMs0xcxpDzI4JqZ.OfyZ.1jp6VceRSyUqROHe22AOu62hye',
                'created_at' => null,
                'updated_at' => null,
            ],
        ];
        DB::table('users')->insert($users);
    }
}
