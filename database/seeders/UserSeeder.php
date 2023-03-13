<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $array = array(
            array(
                'name'          => 'Admin',
                'email'         => 'admin@email.com',
                'password'      => bcrypt('password'),
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ),
        );
        DB::table('users')->insert($array);
    }
}
