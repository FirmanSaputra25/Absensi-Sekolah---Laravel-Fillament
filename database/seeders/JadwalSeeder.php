<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jadwal;
use App\Models\Guru;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jadwals = [
            ['guru_id' => 1, 'kelas' => '10 IPA', 'mata_pelajaran' => 'Matematika', 'hari' => 'Senin', 'jam_mulai' => '08:00:00', 'jam_selesai' => '09:30:00'],
            ['guru_id' => 2, 'kelas' => '10 IPS', 'mata_pelajaran' => 'Bahasa Indonesia', 'hari' => 'Selasa', 'jam_mulai' => '09:30:00', 'jam_selesai' => '11:00:00'],
            ['guru_id' => 3, 'kelas' => '11 IPA', 'mata_pelajaran' => 'Fisika', 'hari' => 'Rabu', 'jam_mulai' => '08:00:00', 'jam_selesai' => '09:30:00'],
            ['guru_id' => 4, 'kelas' => '11 IPS', 'mata_pelajaran' => 'Sejarah', 'hari' => 'Kamis', 'jam_mulai' => '10:00:00', 'jam_selesai' => '11:30:00'],
        ];

        foreach ($jadwals as $jadwal) {
            Jadwal::create($jadwal);
        }
    }
}