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
            //regional 3
            [
                'divisi_id' => '1',
                'departemen' => 'Regional 3 Head',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '2',
                'departemen' => 'Division Head Pelayanan SDM & Umum',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '2',
                'departemen' => 'Departemen Hukum dan Hubungan Masyarakat',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '2',
                'departemen' => 'Departemen Pengadaan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '2',
                'departemen' => 'Departemen Umum',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '2',
                'departemen' => 'Departemen Pelayanan SDM',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '3',
                'departemen' => 'Division Head Komersial',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '3',
                'departemen' => 'Departemen Pemasaran',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '3',
                'departemen' => 'Departemen Pengusahaan Properti',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '4',
                'departemen' => 'Division Head Teknik',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '4',
                'departemen' => 'Departemen Pemeliharaan Fasilitas Pelabuhan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '4',
                'departemen' => 'Departemen Pemeliharaan Peralatan Pelabuhan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '4',
                'departemen' => 'Departemen Sistem Manajamen',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '4',
                'departemen' => 'Departemen Teknologi Informasi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '4',
                'departemen' => 'Departemen PMO Peralatan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '4',
                'departemen' => 'Departemen PMO Bali Nusa Tenggara',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '4',
                'departemen' => 'Departemen PMO Jawa Tengah',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '4',
                'departemen' => 'Departemen PMO Kalimantan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '5',
                'departemen' => 'Division Head Operasi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '5',
                'departemen' => 'Departemen HSSE',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '5',
                'departemen' => 'Departemen Pelaporan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '5',
                'departemen' => 'Departemen Pelayanan Kapal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '5',
                'departemen' => 'Departemen Pelayanan Petikemas & Barang',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '5',
                'departemen' => 'Departemen Pelayanan Ro-Ro & Penumpang',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '6',
                'departemen' => 'Division Head Pengelolaan Keuangan dan Perpajakan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '6',
                'departemen' => 'Departemen Perbendaharaan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '6',
                'departemen' => 'Departemen Perpajakan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '6',
                'departemen' => 'Departemen Pusat Layanan Keuangan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '7',
                'departemen' => 'Division Head Anggaran, Akuntansi dan Pelaporan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '7',
                'departemen' => 'Departemen Akuntansi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '7',
                'departemen' => 'Departemen Anggaran',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '7',
                'departemen' => 'Departemen Aset Tetap',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '7',
                'departemen' => 'Departemen Pelaporan Keuangan',
                'created_at' => null,
                'updated_at' => null,
            ],
            //Sub regional jawa
            [
                'divisi_id' => '8',
                'departemen' => 'Chief Executive Officer (CEO) Sub Regional Jawa',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '9',
                'departemen' => 'Manager Regional Pelayanan Kapal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '9',
                'departemen' => 'Deputi Manajer Perencanaan dan Pengendalian',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '9',
                'departemen' => 'Deputi Manajer Pelayanan Pemanduan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '9',
                'departemen' => 'Supervisor Pelayanan Kapal Gresik',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '9',
                'departemen' => 'Supervisor Pelayanan Kapal dan Rupa-Rupa Usaha Tanjung Wangi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '9',
                'departemen' => 'Supervisor Pelayanan Kapal dan Rupa-Rupa Usaha Tanjung Intan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '10',
                'departemen' => 'Manager Regional Komersial',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '10',
                'departemen' => 'Deputi Manajer Pemasaran',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '10',
                'departemen' => 'Deputi Manajer Pelayanan Pelanggan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '11',
                'departemen' => 'Manager Regional Properti dan Rupa-Rupa Usaha',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '11',
                'departemen' => 'Deputi Manajer Properti dan Rupa-Rupa Usaha Wilayah 1',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '11',
                'departemen' => 'Deputi Manajer Properti dan Rupa-Rupa Usaha Wilayah 2',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '12',
                'departemen' => 'Manager Regional Teknik',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '12',
                'departemen' => 'Deputi Manajer Perencanaan Fasilitas',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '12',
                'departemen' => 'Deputi Manajer Pemeliharaan Fasilitas',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '12',
                'departemen' => 'Deputi Manajer Teknik Jateng',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '12',
                'departemen' => 'Deputi Manajer Peralatan dan Instalasi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '12',
                'departemen' => 'Supervisor Teknik Gresik',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '13',
                'departemen' => 'Manager Regional Sumber Daya Manusia dan Umum',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '13',
                'departemen' => 'Deputi Manajer SDM dan Legal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '13',
                'departemen' => 'Deputi Manajer Umum dan Humas',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '13',
                'departemen' => 'Deputi Manajer Health, Safety, Security, and Environment',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '14',
                'departemen' => 'Manager Regional Keuangan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '14',
                'departemen' => 'Deputi Manajer Akuntansi Keuangan dan Manajemen',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '14',
                'departemen' => 'Deputi Manajer Perbendaharaan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '15',
                'departemen' => 'Deputi Manajer Tanggung Jawab Sosial dan Lingkungan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '16',
                'departemen' => 'Deputi Manajer Manajemen Mutu dan Risiko',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '17',
                'departemen' => 'Deputi Manajer Teknologi Informasi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '18',
                'departemen' => 'General Manager Kalimas, Terminal Penumpang & Roro',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '18',
                'departemen' => 'Manajer Pelayanan Terminal Area 1',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '18',
                'departemen' => 'Manajer Pelayanan Terminal Area 2',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '18',
                'departemen' => 'Manajer Terminal Penumpang GSN dan Roro',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '19',
                'departemen' => 'General Manager Gresik',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '19',
                'departemen' => 'Manajer Pelayanan Terminal ',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '20',
                'departemen' => 'General Manager Tanjung Tembaga',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '20',
                'departemen' => 'Manajer Pelayanan Terminal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '21',
                'departemen' => 'General Manager Kalianget',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '22',
                'departemen' => 'General Manager Tanjung Emas',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '22',
                'departemen' => 'Manajer Pelayanan Terminal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '22',
                'departemen' => 'Manajer Terminal Penumpang',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '23',
                'departemen' => 'General Manager Tegal',
                'created_at' => null,
                'updated_at' => null,
            ],
            //sub regional kalimantan
            [
                'divisi_id' => '24',
                'departemen' => 'Chief Executive Officer (CEO) Sub Regional Kalimantan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '25',
                'departemen' => 'Manager Regional Pelayanan Kapal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '25',
                'departemen' => 'Deputi Manajer Perencanaan, Pengendalian & Terminal Penumpang Bandarmasih',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '25',
                'departemen' => 'Deputi Manajer Pelayanan Pemanduan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '25',
                'departemen' => 'Supervisor Pelayanan Kapal Kotabaru',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '25',
                'departemen' => 'Supervisor Pelayanan Kapal Batulicin',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '25',
                'departemen' => 'Supervisor Pelayanan Kapal Sampit & Bagendang',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '25',
                'departemen' => 'Supervisor Pelayanan Kapal Kumai & Bumiharjo',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '26',
                'departemen' => 'Manajer Regional Komersial',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '26',
                'departemen' => 'Deputi Manajer Pemasaran dan Pelayanan Pelanggan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '26',
                'departemen' => 'Deputi Manajer Properti dan Rupa-Rupa Usaha',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '26',
                'departemen' => 'Manajer Pelayanan Pelabuhan Kumai',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '26',
                'departemen' => 'Manajer Pelayanan Pelabuhan Sampit',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '27',
                'departemen' => 'Manajer Regional Teknik',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '27',
                'departemen' => 'Deputi Manajer Fasilitas',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '27',
                'departemen' => 'Deputi Manajer Peralatan dan Instalasi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '27',
                'departemen' => 'Supervisor Teknik Kotabaru',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '27',
                'departemen' => 'Supervisor Teknik Batulicin',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '28',
                'departemen' => 'Manajer Regional Sumber Daya Manusia dan Umum',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '28',
                'departemen' => 'Deputi Manajer Sumber Daya Manusia dan Legal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '28',
                'departemen' => 'Deputi Manajer Umum Humas dan TJSL',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '28',
                'departemen' => 'Deputi Manajer Health, Safety, Security, and Environment',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '29',
                'departemen' => 'Manajer Regional Keuangan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '29',
                'departemen' => 'Deputi Manajer Akuntansi Keuangan dan Manajemen',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '29',
                'departemen' => 'Deputi Manajer Pembendaharaan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '30',
                'departemen' => 'Deputi Manajemen Mutu dan Risiko',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '31',
                'departemen' => 'Deputi Manajer Teknologi Informasi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '32',
                'departemen' => 'General Manager Kotabaru',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '32',
                'departemen' => 'Manajer Pelayanan Terminal Kotabaru',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '33',
                'departemen' => 'General Manager Pulang Pisau',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '34',
                'departemen' => 'General Manager Batu Licin',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '34',
                'departemen' => 'Manajer Pelayanan Terminal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '34',
                'departemen' => 'Supervisor Terminal Satui',
                'created_at' => null,
                'updated_at' => null,
            ],
            //sub regional bali nusra
            [
                'divisi_id' => '35',
                'departemen' => 'Chief Executive Officer (CEO) Sub Regional Bali Nusra',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '36',
                'departemen' => 'Manajer Regional Pelayanan Kapal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '36',
                'departemen' => 'Deputi Manajer Perencanaan dan Pengendalian',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '36',
                'departemen' => 'Deputi Manajer Pelayanan Pemanduan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '36',
                'departemen' => 'Supervisor Pelayanan Kapal dan Non Petikemas Tenau Kupang',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '36',
                'departemen' => 'Supervisor Pelayanan Kapal Lembar',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '37',
                'departemen' => 'Manajer Regional Komersial',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '37',
                'departemen' => 'Deputi Manajer Pemasaran dan Pelayanan Pelanggan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '37',
                'departemen' => 'Deputi Manajer Properti dan Rupa-Rupa Usaha',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '38',
                'departemen' => 'Manajer Regional Teknik',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '38',
                'departemen' => 'Deputi Manajer Fasilitas',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '38',
                'departemen' => 'Deputi Manajer Peralatan dan Instalasi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '38',
                'departemen' => 'Supervisor Teknik Tenau Kupang & Kalabahi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '38',
                'departemen' => 'Supervisor Teknik Waingapu',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '38',
                'departemen' => 'Supervisor Teknik Maumere & Ende-Ippi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '38',
                'departemen' => 'Supervisor Teknik Lembar',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '38',
                'departemen' => 'Supervisor Teknik Bima & Badas',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '39',
                'departemen' => 'Deputi Manajer Sumber Daya Manusia dan Legal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '39',
                'departemen' => 'Deputi Manajer Umum dan Humas',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '39',
                'departemen' => 'Deputi Manajer Health, Safety, Security, and Environment',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '40',
                'departemen' => 'Deputi Manajer Akuntansi Keuangan dan Manajemen',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '40',
                'departemen' => 'Deputi Manajer Pembendaharaan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '41',
                'departemen' => 'Deputi Manajer Tanggung Jawab Sosial dan Lingkungan',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '42',
                'departemen' => 'Deputi Manajer Mutu dan Risiko',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '43',
                'departemen' => 'Deputi Manajer Teknologi Informasi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '44',
                'departemen' => 'General Manager Benoa',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '44',
                'departemen' => 'Manajer Pelayanan Terminal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '45',
                'departemen' => 'General Manager Lembar',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '45',
                'departemen' => 'Manajer Pelayanan Petikemas',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '45',
                'departemen' => 'Manajer Pelayanan Non Petikemas',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '46',
                'departemen' => 'General Manager Bima',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '46',
                'departemen' => 'Manajer Pelayanan Terminal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '47',
                'departemen' => 'General Manager Celukan Bawang',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '47',
                'departemen' => 'Manajer Pelayanan Terminal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '48',
                'departemen' => 'General Manager Maumere',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '48',
                'departemen' => 'Manajer Pelayanan Terminal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '49',
                'departemen' => 'General Manager Ende-Ippi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '50',
                'departemen' => 'General Manager Waingapu',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '50',
                'departemen' => 'Manajer Pelayanan Terminal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '51',
                'departemen' => 'General Manager Kalabahi',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '52',
                'departemen' => 'General Manager Badas',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '52',
                'departemen' => 'Manajer Pelayanan Terminal',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'divisi_id' => '53',
                'departemen' => 'General Manager Labuan Bajo',
                'created_at' => null,
                'updated_at' => null,
            ],
        ];
        DB::table('departemen')->insert($departemen);
    }
}
