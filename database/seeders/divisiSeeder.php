<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class divisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $divisi =[
            [
                'divisi' => 'Divisi Komersial',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi' => 'Divisi Operasi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi' => 'Divisi Teknik',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi' => 'Divisi Pelayanan SDM & Umum',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi' => 'Divisi Pengelolaan Keuangan dan Perpajakan',
                'created_at' => null,
                'updated_at' => null,
            ],
        ];
        DB::table('divisi')->insert($divisi);
    }
}
