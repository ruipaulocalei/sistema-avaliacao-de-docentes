<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "Abel Zacarias",
            'email' => "abel@iph.com",
            'password' => Hash::make('12345678'),
        ]);

        $user->attachRole("professor");

        $user = User::create([
            'name' => "Henriques Zacarias",
            'email' => "henrique@iph.com",
            'password' => Hash::make('12345678'),
        ]);

        $user->attachRole("professor");

        $user = User::create([
            'name' => "Daniel Moisés",
            'email' => "daniel@iph.com",
            'password' => Hash::make('12345678'),
        ]);

        $user->attachRole("professor");

        $user = User::create([
            'name' => "Orlando Cawende",
            'email' => "orlando@iph.com",
            'password' => Hash::make('12345678'),
        ]);

        $user->attachRole("professor");

        $user = User::create([
            'name' => "Evaldo Chindele",
            'email' => "evaldo@iph.com",
            'password' => Hash::make('12345678'),
        ]);

        $user->attachRole("professor");
    }
}
