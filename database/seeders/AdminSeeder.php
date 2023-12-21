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
        'profile_picture' => '',
        'nama_lengkap' => 'Super Admin',
        'no_telepon' => '085647011111',
        'email' => 'muhamadndarusabitturahman24@gmail.com',
        'password' => bcrypt("Superadmin123?"),
        'role' => 'admin',
        'rekening' => '',
        'status' => 1,
    ]);

    DB::table('users')->insert([
        'profile_picture' => '',
        'nama_lengkap' => 'Ndaru',
        'no_telepon' => '085647019630',
        'email' => 'ndarusabitturahman@gmail.com',
        'password' => bcrypt("Ndaru240101?"),
        'role' => 'user',
        'rekening' => '',
        'status' => 1,
    ]);

    DB::table('users')->insert([
        'profile_picture' => '',
        'nama_lengkap' => 'Cipung Tour',
        'no_telepon' => '085647012222',
        'email' => 'cipungtour@gmail.com',
        'password' => bcrypt("Cipungtour123?"),
        'role' => 'mitra',
        'rekening' => '12121212',
        'status' => 1,
    ]);
    
    DB::table('users')->insert([
        'profile_picture' => '',
        'nama_lengkap' => 'Seno Tour',
        'no_telepon' => '085647013333',
        'email' => 'senotour@gmail.com',
        'password' => bcrypt("Senotour123?"),
        'role' => 'mitra',
        'rekening' => '13131313113',
        'status' => 1,
    ]);

    }
}
