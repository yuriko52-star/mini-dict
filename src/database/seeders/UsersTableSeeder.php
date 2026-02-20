<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'セネカ',
            'email' => 'seneka@gmail.com',
            'password' => Hash::make('senekaseneka'),
            
        ];
        DB::table('users')->insert($data);

    }
}
