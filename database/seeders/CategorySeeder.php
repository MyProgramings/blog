<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'التشخيصية',
            'slug' => 'التشخيصية',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'title' => 'الجراحية',
            'slug' => 'الجراحية',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'title' => 'العلاجية',
            'slug' => 'العلاجية',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'title' => 'الوقائية',
            'slug' => 'الوقائية',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'title' => 'الكهربائية',
            'slug' => 'الكهربائية',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'title' => 'الإشعاعية',
            'slug' => 'الإشعاعية',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'title' => 'البصرية',
            'slug' => 'البصرية',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'title' => 'البيولوجية',
            'slug' => 'البيولوجية',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'title' => 'الكيميائية',
            'slug' => 'الكيميائية',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
