<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gurus = [
            ['name' => 'Pak Budi', 'mata_pelajaran' => 'Matematika', 'kelas' => '10 IPA'],
            ['name' => 'Bu Siti', 'mata_pelajaran' => 'Bahasa Indonesia', 'kelas' => '10 IPS'],
            ['name' => 'Pak Joko', 'mata_pelajaran' => 'Fisika', 'kelas' => '11 IPA'],
            ['name' => 'Bu Rina', 'mata_pelajaran' => 'Sejarah', 'kelas' => '11 IPS'],
            ['name' => 'Pak Anto', 'mata_pelajaran' => 'Kimia', 'kelas' => '12 IPA'],
            ['name' => 'Bu Dewi', 'mata_pelajaran' => 'Ekonomi', 'kelas' => '12 IPS'],
        ];

        foreach ($gurus as $guru) {
            Guru::create($guru);
        }
    }
}