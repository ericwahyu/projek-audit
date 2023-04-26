<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $nilai =[
            [
                'nama' => 'MA',
                'score' => 0,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => 'MI',
                'score' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => 'OBS',
                'score' => 2,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => 'OK',
                'score' => 3,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => 'IMP',
                'score' => 4,
                'created_at' => null,
                'updated_at' => null,
            ],
        ];
        DB::table('nilai')->insert($nilai);
    }
}
