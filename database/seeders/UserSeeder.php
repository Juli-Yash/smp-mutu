<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Hokky Caraka',
            'email' => 'admin@ppdb.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        
        // Kepala Sekolah
        User::create([
            'name' => 'Widiastuti',
            'email' => 'kepsek@ppdb.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'kepsek',
        ]);

        // Contoh Calon Siswa
        User::create([
            'name' => 'Gregorius De Santos',
            'email' => 'siswa1@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}