<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => "Ozodbek",
            'email' => 'qurbonovo2008@gmail.com',
            'password' => 'Ozodbek',
            'phone' => '+998972107497'
        ]);
    }
}
