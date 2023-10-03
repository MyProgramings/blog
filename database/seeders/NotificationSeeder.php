<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->insert([
            'user_id' => 2,
            'post_id' => 2,
            'post_userid' => 1,
            'created_at' => '2022-05-05 08:44',
        ]);
        DB::table('notifications')->insert([
            'user_id' => 2,
            'post_id' => 3,
            'post_userid' => 1,
            'created_at' => '2022-05-05 08:44',
        ]);
        DB::table('notifications')->insert([
            'user_id' => 3,
            'post_id' => 4,
            'post_userid' => 1,
            'created_at' => '2022-05-05 08:44',
        ]);
    }
}
