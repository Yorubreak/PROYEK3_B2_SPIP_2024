<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
          'firstname' => 'Nalendra',
          'lastname'  => 'Praja',
          'username' => 'Cobalt',
          'email'    => 'nalendra.praja.tif23@polban.ac.id',
          'password' =>  Hash::make('nalendra23'),
        ]);
    }
}
