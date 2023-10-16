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
            'status' => 1,
        ]);

        DB::table('users')->insert([
            'nama_lengkap' => 'Ndaru',
            'no_telepon' => '085647019630',
            'email' => 'ndaru123@gmail.com',
            'password' => bcrypt("Ndaru123"),
            'role' => 'user',
            'status' => 1,
        ]);

        DB::table('users')->insert([
            'nama_lengkap' => 'Cipung Tour',
            'no_telepon' => '085647019560',
            'email' => 'cipungtour@gmail.com',
            'password' => bcrypt("Cipungtour123"),
            'role' => 'mitra',
            'status' => 1,
        ]);
        DB::table('users')->insert([
            'nama_lengkap' => 'Seno Tour',
            'no_telepon' => '0856557019632',
            'email' => 'senotour@gmail.com',
            'password' => bcrypt("Senotour123"),
            'role' => 'mitra',
            'status' => 1,
        ]);

    }
}
