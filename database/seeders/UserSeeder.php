<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 1,
            'name' => 'Pemilik',
            'email' => 'pemilik@mail.com',
            'email_verified_at' => now(),
            'gender' => 'Laki-laki',
            'phone_number' => '+628' . mt_rand(100, 400) . mt_rand(500, 700) . mt_rand(1000, 9000),
            'photo' => 'assets/images/default.png',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Karyawan 1',
            'email' => 'karyawan1@mail.com',
            'email_verified_at' => now(),
            'gender' => 'Laki-laki',
            'phone_number' => '+628' . mt_rand(100, 400) . mt_rand(500, 700) . mt_rand(1000, 9000),
            'photo' => 'assets/images/default.png',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Karyawan 2',
            'email' => 'karyawan2@mail.com',
            'email_verified_at' => now(),
            'gender' => 'Laki-laki',
            'phone_number' => '+628' . mt_rand(100, 400) . mt_rand(500, 700) . mt_rand(1000, 9000),
            'photo' => 'assets/images/default.png',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);
    }
}
