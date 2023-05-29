<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class Admins extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->Insert([
            'firstName'=>'Gaurav',
            'lastName'=>'Kumar',
            'email'=>'admin@gmail.com',
            'phoneNumber'=>'9953225125',
            'password'=>Hash::make('Admin@123')
        ]);

    }
}
