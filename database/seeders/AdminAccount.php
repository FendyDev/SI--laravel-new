<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminAccount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'username' => faker::username(20),
            'nama_lengkap' => faker::name(20),
            'password' => Hash::make('password'),
            'role' => '',
            'level' => 'Admin'
        ]);
    }
}
