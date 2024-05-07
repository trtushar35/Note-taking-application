<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'role'=>'admin',
            'phone'=>'01931150014',
            'address'=>'Tangail',
            'password'=>bcrypt('123456'),
        ]);
    }
}
