<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role =[
            [
                'role' => 'admin',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'role' => 'auditor',
                'created_at' => null,
                'updated_at' => null,
            ],
        ];
        DB::table('role')->insert($role);
    }
}
