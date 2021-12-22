<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
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
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'User Administrator'
        ]);

        $pengguna = Role::create([
            'name' => 'pengguna',
            'display_name' => 'User Biasa'
        ]);

        $user = new User();
        $user->name = "Fajar MS";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make('123456789');
        $user->save();

        $pengunjung = new User();
        $pengunjung->name = "pengunjung";
        $pengunjung->email = "pengunjung@gmail.com";
        $pengunjung->password = Hash::make('pengunjung');
        $pengunjung->save();

        $user = new User();
        $user->name = "Fajar Mohamad Sidyq";
        $user->email = "fajarmohamadsidyq@gmail.com";
        $user->password = Hash::make('123456789');
        $user->save();

        $user->attachRole($admin);
        $pengunjung->attachRole($pengguna);
    }
}
