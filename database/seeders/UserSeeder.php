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
            'name'=> 'edgar2',
            'email'=>'edgar2@hotmail.com',
            'password'=> bcrypt('123456789')
        ])->assignRole('Profesor');
    }
}
