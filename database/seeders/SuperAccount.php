<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAccount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'username' => 'super1',
            'nama_lengkap' => 'super1',
            'password' => Hash::make('super1'),
            'role' => '', 
            'level' => 'SuperAdmin'
        ]);

        // SuperAccount::create([
        //     'username' => 'super1',
        //     'nama_lengkap' => 'super',
        //     'password' => 'super',
        //     'level' => 'SuperAdmin',
        // ]);
    }
}
