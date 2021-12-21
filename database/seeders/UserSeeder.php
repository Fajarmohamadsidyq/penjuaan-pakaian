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
        $user = new User();
        $user->name = "Fajar Mohamad Sidyq";
        $user->email = "fajarmohamadsidyq@gmail.com";
        $user->password = Hash::make('123456789');
        $user->save();
    }
}
