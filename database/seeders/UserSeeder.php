<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            // 'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin' . '@gmail.com',
            'phone' => '03412356789',
            'password' => Hash::make('password'),
            'department_id' => '1',
            'status_id' => '1',
            // 'created_at' => now(),
        ]);
        DB::table('users')->insert([
            // 'username' => 'student1',
            'name' => 'Student1',
            'email' => 'Student1' . '@gmail.com',
            'phone' => '03489123567',
            'password' => Hash::make('password'),
            'department_id' => '2',
            'status_id' => '2',
            // 'created_at' => now(),
        ]);
    }
}
