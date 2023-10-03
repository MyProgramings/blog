<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'add-post',
            'desc' => 'إضافة المواضيع',
        ]);
        DB::table('permissions')->insert([
            'name' => 'edit-post',
            'desc' => 'تعديل المواضيع',
        ]);
        DB::table('permissions')->insert([
            'name' => 'delete-post',
            'desc' => 'حذف المواضيع',
        ]);
        DB::table('permissions')->insert([
            'name' => 'add-user',
            'desc' => 'إضافة المستخدمين',
        ]);
        DB::table('permissions')->insert([
            'name' => 'edit-user',
            'desc' => 'تعديل بيانات المستخدمين',
        ]);
        DB::table('permissions')->insert([
            'name' => 'delete-user',
            'desc' => 'حذف المستخدمين',
        ]);
    }
}
