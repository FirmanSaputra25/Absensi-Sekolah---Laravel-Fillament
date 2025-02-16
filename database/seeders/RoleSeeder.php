<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $guru = Role::create(['name' => 'guru']);
        $murid = Role::create(['name' => 'murid']);

        $user1 = User::create([
            'name' => 'Guru Satu',
            'email' => 'guru@example.com',
            'password' => bcrypt('password'),
        ]);
        $user1->assignRole($guru);

        $user2 = User::create([
            'name' => 'Murid Satu',
            'email' => 'murid@example.com',
            'password' => bcrypt('password'),
        ]);
        $user2->assignRole($murid);
    }
}