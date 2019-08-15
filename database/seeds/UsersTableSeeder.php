<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('book')->delete(); //delete all records
        User::truncate();

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Joko Priyanto',
                'email' => 'admin@kasirpintar.com',
                'password' => bcrypt('adminkasirpintar'),
                'role'=> 1,
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'name' => 'Imanuel Joyosantiko',
                'email' => 'staf@kasirpintar.com',
                'password' => bcrypt('stafkasirpintar'),
                'role'=> 0,
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'name' => 'Adjie Joyo diningrat',
                'email' => 'owner@kasirpintar.com',
                'password' => bcrypt('ownerkasirpintar'),
                'role'=> 2,
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}