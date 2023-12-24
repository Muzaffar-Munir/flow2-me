<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Mubashar',
            'last_name' => 'Munir',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'status' => true,
        ]);
        $user->assignRole('admin');
    }
}
