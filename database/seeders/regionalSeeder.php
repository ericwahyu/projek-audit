<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class regionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $regional =[
            [
                'nama' => 'Kantor Regional 3',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => 'Regional Jawa',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => 'Regional Kalimantan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => 'Regional Bali Nusra',
                'created_at' => null,
                'updated_at' => null,
            ],

        ];
        DB::table('regional')->insert($regional);
    }
}
