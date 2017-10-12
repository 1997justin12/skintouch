<?php

use Illuminate\Database\Seeder;

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
                'name' => 'Mayordoma Jonalyn',
                'email' => 'jownalien@yahoo.com',
                'password' => bcrypt('secret'),
                'role' => 0
            ]);
    }
}
