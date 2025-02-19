<?php

namespace Database\Seeders;

use App\Models\Performance;
use Illuminate\Database\Seeder;

class PerformanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Performance::create([
            'name' => 'Datang Terlambat (Piket)'
        ]);
        Performance::create([
            'name' => 'Pulang Awal'
        ]);
        Performance::create([
            'name' => 'Tidak Masuk (Alpha, Izin, Sakit)'
        ]);
        Performance::create([
            'name' => 'Keluar Sekolah Tanpa Izin Kepala Sekolah'
        ]);
        Performance::create([
            'name' => 'Tidak Memakai Seragam'
        ]);
        Performance::create([
            'name' => 'Jumlah Juz Tilawah dalam sebulan (min 30 Juz)'
        ]);
        Performance::create([
            'name' => 'Pencapaian Hafalan (1 Surat = 100)'
        ]);
        Performance::create([
            'name' => 'Mengajar Tidak Sesuai dengan RPP terpadu yang dibuat'
        ]);
        Performance::create([
            'name' => 'Tidak Mengikuti Rapat/Agenda Sekolah Yayasan'
        ]);
        Performance::create([
            'name' => 'Melaksanakan Puasa Sunnah dalam 1 Bulan (Min 4X)'
        ]);
        Performance::create([
            'name' => 'Hadir Pembinaan Pekanan'
        ]);
    }
}
