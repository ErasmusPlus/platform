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
          'name' => 'Dimitris Tsiktsiris',
          'email' => 'tsiktsiris@erasmus.eu',
          'role' => 1,
          'password' => bcrypt('tsiktsiris'),
      ]);

      DB::table('users')->insert([
          'name' => 'Antonis Mpantis',
          'email' => 'mpantis@erasmus.eu',
          'role' => 1,
          'password' => bcrypt('mpantis'),
      ]);

      DB::table('users')->insert([
          'name' => 'Demo Admin',
          'email' => 'admin@uowm.gr',
          'role' => 2,
          'depID' => 604,
          'depName' => 'Τμήμα Μηχανικών Πληροφορικής & Τηλεπικοινωνιών',
          'password' => bcrypt('admin'),
      ]);

      DB::table('users')->insert([
          'name' => 'Demo Superadmin',
          'email' => 'superadmin@uowm.gr',
          'role' => 3,
          'password' => bcrypt('superadmin'),
      ]);
    }
}
