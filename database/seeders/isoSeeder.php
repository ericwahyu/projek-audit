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
                'uraian' => 'Sistem Manajemen Mutu',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => '14001',
                'uraian' => 'Sistem Manajemen Lingkungan',
                'created_at' => null,
                'updated_at' => null,
            ], 
            [
                'nama' => '20000',
                'uraian' => 'Sistem Manajemen Layanan Teknologi Informasi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => '22301',
                'uraian' => 'Sistem Manajemen Keberlangsungan Bisnis',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => '27001',
                'uraian' => 'Sistem Manajemen Keamanan Informasi',
                'created_at' => null,
                'updated_at' => null,
            ],
            
            [
                'nama' => '37001',
                'uraian' => 'Sistem Manajemen Anti Penyuapan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => '45001',
                'uraian' => 'Sistem Manajemen Kesehatan dan Keselamatan Kerja',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => '50001',
                'uraian' => 'Sistem Manajemen Energi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => 'ISPS Code',
                'uraian' => 'Sistem Manajemen Keamanan Kapal dan Fasilitas Pelabuhan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nama' => 'SMK3',
                'uraian' => 'Sistem Manajemen Keselamatan dan Kesehatan Kerja',
                'created_at' => null,
                'updated_at' => null,
            ],
        ];
        DB::table('iso')->insert($iso);
    }
}
