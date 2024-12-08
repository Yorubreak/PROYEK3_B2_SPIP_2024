<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
          'firstname' => 'Nalendra',
          'lastname'  => 'Praja',
          'username' => 'Superadmin',
          'email'    => 'nalendra.praja.tif23@polban.ac.id',
          'password' =>  Hash::make('12345678'),
          'isSuperadmin' => true
        ]);
    }
}
