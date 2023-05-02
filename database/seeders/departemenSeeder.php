<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class departemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $departemen =[
            [
                'divisi_id' => '1',
                'departemen' => 'Departemen Pengusahaan Properti',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '1',
                'departemen' => 'Departemen Pemasaran',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '2',
                'departemen' => 'Departemen Pelayanan Kapal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '2',
                'departemen' => 'Departemen Petikemas & Barang',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '2',
                'departemen' => 'Departemen Pelayanan RO-RO & Penumpang',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '2',
                'departemen' => 'Departemen HSSE',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '2',
                'departemen' => 'Departemen Pelaporan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '3',
                'departemen' => 'Departemen Pemeliharaan & Peralatan Pelabuhan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '3',
                'departemen' => 'Departemen Pemeliharaan Fasilitas Pelabuhan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '3',
                'departemen' => 'Departemen Sistem Manajemen',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '3',
                'departemen' => 'Departemen Teknologi Informasi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '4',
                'departemen' => 'Departemen Pelayanan SDM',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '4',
                'departemen' => 'Departemen Umum',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '4',
                'departemen' => 'Departemen Hukum & Hubungan Masyarakat',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '4',
                'departemen' => 'Departemen Pengadaan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '5',
                'departemen' => 'Departemen Perpajakan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '5',
                'departemen' => 'Departemen Perbendaharaan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '5',
                'departemen' => 'Departemen Pusat Pelayanan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '5',
                'departemen' => 'Departemen Keuangan',
                'created_at' => null,
                'updated_at' => null,
            ],
        ];
        DB::table('departemen')->insert($departemen);
    }
}
