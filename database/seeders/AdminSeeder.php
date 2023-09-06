<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nama_lengkap' => 'Super Admin',
            'no_telepon' => '085647019630',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt("Superadmin123"),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'nama_lengkap' => 'M Ndaru Sabitturahman',
            'no_telepon' => '085647019630',
            'email' => 'ndaru123@gmail.com',
            'password' => bcrypt("Ndaru123"),
            'role' => 'user',
        ]);

        DB::table('users')->insert([
            'nama_lengkap' => 'Ndaru Tour',
            'no_telepon' => '085647019630',
            'email' => 'ndarutour@gmail.com',
            'password' => bcrypt("Ndarutour123"),
            'role' => 'mitra',
        ]);

    }
}
