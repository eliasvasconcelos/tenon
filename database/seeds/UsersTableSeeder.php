<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Elias',
                'sobrenome' => 'Vasconcelos',
                'email' => 'claroelias@outlook.com',
                'password' => bcrypt('123'),
                'remember_token' => str_random(10),
                'tipo_id' => 2,
                'status_id'=>  1,
                'avatar' => 'default.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],[
                'name' => 'Gerciane',
                'sobrenome' => 'Uliana',
                'email' => 'gerciane@outlook.com',
                'password' => bcrypt('123'),
                'remember_token' => str_random(10),
                'tipo_id' => 2,
                'status_id'=>  1,
                'avatar' => 'default.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
