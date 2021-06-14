<?php

namespace Database\Seeders;

use App\Models\Medewerker;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medewerker::create([
            'voornaam' => 'test',
            'achternaam' => 'test'
        ]);

        Medewerker::create([
            'voornaam' => 'jacky',
            'achternaam' => 'zheng' 
        ]);

        Medewerker::create([
            'voornaam' => 'jaap',
            'achternaam' => 'rodenburg' 
        ]);

        Rol::create([
            'rol' => 'werknemer'
        ]);

        User::create([
            'email' => 'test@test.nl',
            'password' =>  Hash::make('test'),
            'medewerker_id' => 1,
            'rol' => 'werknemer'
        ]);
    }
}
