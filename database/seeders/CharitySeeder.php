<?php

namespace Database\Seeders;

use App\Models\Charity;
use Illuminate\Database\Seeder;

class CharitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Charity::create([
            'name' => 'Sholat Lail, 2X tiap pekan'
        ]);
        Charity::create([
            'name' => 'Membaca Istighfar, 70X/hari'
        ]);
        Charity::create([
            'name' => "Al-Ma'tsurat, 1X /hari"
        ]);
        Charity::create([
            'name' => 'ZIS/Bermanfaat bagi oranglain'
        ]);
        Charity::create([
            'name' => 'Tilawah (One Day one Juz)'
        ]);
        Charity::create([
            'name' => 'Shalat fardhu berjamaah*'
        ]);
        Charity::create([
            'name' => 'Shalat Dhuha, Min 4Rekaat/hari'
        ]);
        Charity::create([
            'name' => 'Sholat Rowatib, min 6 Rekaat/hari'
        ]);
        Charity::create([
            'name' => 'Olah raga, min 2X tiap pekan'
        ]);
        Charity::create([
            'name' => 'Pembinaan, 4X tiap bulan'
        ]);
        Charity::create([
            'name' => 'PMM/Seminar/Workshop/Dauroh'
        ]);
        Charity::create([
            'name' => 'Puasa Sunnah, 3X setiap bulan'
        ]);
        Charity::create([
            'name' => 'Silaturahim, 4X tiap bulan'
        ]);
        Charity::create([
            'name' => 'Do’a Untuk Civitas Robbani'
        ]);
        Charity::create([
            'name' => 'Membaca Al-mulk sebelum tidur'
        ]);
    }
}
