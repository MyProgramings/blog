<?php

namespace Database\Seeders;

use App\Models\Alert;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alert1 = Alert::create([
            'user_id' => User::where('name', 'Abdulah Baagail')->first()->id,
            'alert' => '3',
        ]);
        $alert2 = Alert::create([
            'user_id' => User::where('name', 'Ali Baagail')->first()->id,
            'alert' => '1',
        ]);
        $alert3 = Alert::create([
            'user_id' => User::where('name', 'Omer Baagail')->first()->id,
            'alert' => '0',
        ]);
    }
}
