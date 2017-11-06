<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('settings')->insert([
          'key' => 'platform_status',
          'value' => ''
      ]);

      DB::table('settings')->insert([
          'key' => 'appl_status',
          'value' => ''
      ]);

      DB::table('settings')->insert([
          'key' => 'appl_finaldate',
          'value' => ''
      ]);

      DB::table('settings')->insert([
          'key' => 'appl_extdate',
          'value' => ''
      ]);
    }
}
