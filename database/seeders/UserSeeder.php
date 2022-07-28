<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            ['name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')],

            ['name' => 'manajer',
            'email' => 'manajer@gmail.com',
            'password' => bcrypt('manajer123')],

            ['name' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => bcrypt('kasir123')],

        ]);
    }
}