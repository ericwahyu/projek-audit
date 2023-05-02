<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class isoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $iso =[
            [
                'nama' => '9001',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => '14001',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => '22301',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => '37001',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => '27001',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => '20000',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => '50001',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => '45001',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => 'ISPS Code',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => 'SMK3',
                'created_at' => null,
                'updated_at' => null,
            ],
        ];
        DB::table('iso')->insert($iso);
    }
}
