<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

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
            'name'=> 'Admin',
            'lastname'=> 'Admin',
            'email'=>'admin@hotmail.com',
            'id_grado'=> 0,
            'escolaridad'=>'Director',
            'password'=> bcrypt('123456789'),
            'is_estudiante'=>0
        ])->assignRole('Director');

    }
}
