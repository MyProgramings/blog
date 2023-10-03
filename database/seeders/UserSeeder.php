<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Abdulah Baagail',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('11111111'),
            'role_id' => '1',
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Ali Baagail',
            'email' => 'user@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('11111111'),
            'role_id' => '2',
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Omer Baagail',
            'email' => 'user2@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('11111111'),
            'role_id' => '2',
        ]);
    }
}
