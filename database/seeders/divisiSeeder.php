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
            //kantor regional 3
            [
                'regional_id' => '1',
                'divisi' => 'Divisi Pelayanan SDM & Umum',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '1',
                'divisi' => 'Divisi Komersial',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '1',
                'divisi' => 'Divisi Teknik',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '1',
                'divisi' => 'Divisi Operasi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '1',
                'divisi' => 'Divisi Pengelolaan Keuangan dan Perpajakan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '1',
                'divisi' => 'Divisi Anggaran, Akuntansi dan Pelaporan',
                'created_at' => null,
                'updated_at' => null,
            ],
            //sub regional jawa
            [
                'regional_id' => '2',
                'divisi' => 'Divisi Pelayanan Kapal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '2',
                'divisi' => 'Divisi Komersial',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '2',
                'divisi' => 'Divisi Properti dan Rupa-Rupa Usaha',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '2',
                'divisi' => 'Divisi Teknik',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '2',
                'divisi' => 'Divisi Sumber Daya Manusia dan Umum',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '2',
                'divisi' => 'Divisi Tanggung Jawab Sosial dan Lingkungan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '2',
                'divisi' => 'Divisi Manajemen Mutu dan Risiko',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '2',
                'divisi' => 'Divisi Teknologi Informasi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '2',
                'divisi' => 'Pelabuhan Kalimas dan GSN',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '2',
                'divisi' => 'Pelabuhan Gresik',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '2',
                'divisi' => 'Pelabuhan Tanjung Tembaga',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '2',
                'divisi' => 'Pelabuhan Kalianget',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '2',
                'divisi' => 'Pelabuhan Tanjung Emas',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '2',
                'divisi' => 'Pelabuhan Tegal',
                'created_at' => null,
                'updated_at' => null,
            ],
            //sub regional kalimantan
            [
                'regional_id' => '3',
                'divisi' => 'Divisi Pelayanan Kapal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '3',
                'divisi' => 'Divisi Komersial',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '3',
                'divisi' => 'Divisi Teknik',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '3',
                'divisi' => 'Divisi Sumber Daya Manusia dan Umum',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '3',
                'divisi' => 'Divisi Keuangan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '3',
                'divisi' => 'Divisi Manajemen Mutu dan Risiko',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '3',
                'divisi' => 'Divisi Teknologi Informasi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '3',
                'divisi' => 'Pelabuhan Kotabaru',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '3',
                'divisi' => 'Pelabuhan Pulang Pisau',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '3',
                'divisi' => 'Pelabuhan Batu Licin',
                'created_at' => null,
                'updated_at' => null,
            ],
            //sub regional bali nusra
            [
                'regional_id' => '4',
                'divisi' => 'Divisi Pelayanan Kapal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Divisi Komersial',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Divisi Teknik',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Divisi Sumber Daya Manusia dan Umum',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Divisi Keuangan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Divisi Tanggung Jawab Soisal dan Lingkungan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Divisi Manajemen Mutu dan Risiko',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Divisi Teknologi Informasi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Pelabuhan Benoa',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Pelabuhan Lembar',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Pelabuhan Bima',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Pelabuhan Celukan Bawang',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Pelabuhan Maumere',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Pelabuhan Ende-IPPI',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Pelabuhan Waingapu',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Pelabuhan Kalabahi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Pelabuhan Badas',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => '4',
                'divisi' => 'Pelabuhan Labuan Bajo',
                'created_at' => null,
                'updated_at' => null,
            ],
        ];
        DB::table('divisi')->insert($divisi);
    }
}
