<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //silahkan ubah

        User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'identitas' => '111111', //masukan NIP
            'alamat' => 'Karawang', //masukan alamat
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
