<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class unitSubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $unitSub =[
            //Kantor Regional 3
            [
                'regional_id' => 1,
                'nama' => 'Regional 3 Head',
                'created_at' => null,
                'updated_at' => null,
            ],
            //Sub Regional Jawa
            [
                'regional_id' => 2,
                'nama' => 'CEO Sub Regional Jawa',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 2,
                'nama' => 'Pelabuhan Kalimas dan GSN',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 2,
                'nama' => 'Pelabuhan Gresik',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 2,
                'nama' => 'Pelabuhan Tanjung Tembaga',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 2,
                'nama' => 'Pelabuhan Kalianget',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 2,
                'nama' => 'Pelabuhan Tanjung Emas',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 2,
                'nama' => 'Pelabuhan Tegal',
                'created_at' => null,
                'updated_at' => null,
            ],
            //Sub Regional Kalimantan
            [
                'regional_id' => 3,
                'nama' => 'CEO Sub Regional Kalimantan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 3,
                'nama' => 'Pelabuhan Kotabaru',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 3,
                'nama' => 'Pelabuhan Pulang Pisau',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 3,
                'nama' => 'Pelabuhan Batu Licin',
                'created_at' => null,
                'updated_at' => null,
            ],
            //Sub Regional Bali Nursa
            [
                'regional_id' => 4,
                'nama' => 'CEO Sub Regional Bali Nusra',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 4,
                'nama' => 'Pelabuhan Benoa',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 4,
                'nama' => 'Pelabuhan Lembar',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 4,
                'nama' => 'Pelabuhan Bima',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 4,
                'nama' => 'Pelabuhan Celukan Bawang',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 4,
                'nama' => 'Pelabuhan Maumere',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 4,
                'nama' => 'Pelabuhan Ende-IPPI',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 4,
                'nama' => 'Pelabuhan Waingapu',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 4,
                'nama' => 'Pelabuhan Kalabahi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 4,
                'nama' => 'Pelabuhan Badas',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 4,
                'nama' => 'Pelabuhan Labuan Bajo',
                'created_at' => null,
                'updated_at' => null,
            ],
        ];
        DB::table('unit_sub')->insert($unitSub);
    }
}
