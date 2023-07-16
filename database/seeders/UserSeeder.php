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
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'          => 'Admin',
            'phone_number'  => '6282233445566',
            'email'         => 'admin@mail.com',
            'password'      => Hash::make('12345678'),
            'role'          => 1,
            'created_at'    => '2023-02-17'
        ]);
        
        DB::table('users')->insert([
            'name'          => 'Riqi',
            'phone_number'  => '6282213589072',
            'email'         => 'ikramalmasyriqi@gmail.com',
            'password'      => Hash::make('12345678'),
            'role'          => 1,
            'created_at'    => '2023-02-17'
        ]);

        DB::table('users')->insert([
            'name'          => 'Mitra',
            'phone_number'  => '6282255779944',
            'email'         => 'ikramalmasyriqi@gmail.com',
            'password'      => Hash::make('12345678'),
            'role'          => 2,
            'created_at'    => '2023-02-17'
        ]);
    }
}
