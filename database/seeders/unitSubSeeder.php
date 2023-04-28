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
            [
                'regional_id' => 1,
                'nama' => 'Kantor Pusat Regional',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 2,
                'nama' => 'Terminal Kalimas',
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
                'nama' => 'Pelabuhan Kalianget',
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
            [
                'regional_id' => 3,
                'nama' => 'Pelabuhan Banjarmasin',
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
                'nama' => 'Pelabuhan Kotabaru',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 3,
                'nama' => 'Pelabuhan Sampit',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 3,
                'nama' => 'Pelabuhan Kumai',
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
                'nama' => 'Pelabuhan Tenau Kupang',
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
                'nama' => 'Pelabuhan Maumere',
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
                'nama' => 'Terminal Gilimas',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'regional_id' => 4,
                'nama' => 'Pelabuhan Ende',
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
