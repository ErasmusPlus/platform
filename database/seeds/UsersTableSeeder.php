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
          'name' => 'Demo Student',
          'email' => 'student@demo.com',
          'role_id' => 1,
          'password' => bcrypt('demo'),
      ]);

      DB::table('users')->insert([
          'name' => 'Demo Academic',
          'email' => 'academic@demo.com',
          'role_id' => 2,
          'password' => bcrypt('demo'),
      ]);

      DB::table('users')->insert([
          'name' => 'Demo Administrator',
          'email' => 'admin@demo.com',
          'role_id' => 3,
          'password' => bcrypt('demo'),
      ]);

    }
}
