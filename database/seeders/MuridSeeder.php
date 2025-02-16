<?php

namespace Database\Seeders;

use App\Models\Murid;
use Illuminate\Database\Seeder;

class MuridSeeder extends Seeder
{
    public function run()
    {
        Murid::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'kelas' => '10 IPA',
            'is_active' => true,
        ]);

        Murid::create([
            'name' => 'Siti Aisyah',
            'email' => 'siti@example.com',
            'kelas' => '11 IPS',
            'is_active' => true,
        ]);
    }
}