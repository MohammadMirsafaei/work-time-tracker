<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::create([
            'first_name' => 'محمد',
            'last_name' => 'میرصفایی',
            'email' => 'mohammad.mirsafaee@gmail.com',
            'password' => Hash::make('pass'),
            'phone' => '9843215'
        ]);
    }
}
