<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'name' => 'นพดล',
            'username' => 'nn',
            'status' => 'active',
            'email' => 'riyasarn.n@gmail.com',
            'password' => Hash::make('111')
            ],
            [
                'name' => 'นพดล',
                'username' => 'bb',
                'status' => 'active',
                'email' => 'noppadol.ri1@gmail.com',
                'password' => Hash::make('111')


            ]
        ]);
    }
}
