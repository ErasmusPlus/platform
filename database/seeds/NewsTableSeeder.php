<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        DB::table('news')->insert([
          'title' => 'De Doctor is in!',
          'body' => '
		  Wait for it...wait for it
		  Ask not for whom the spell tolls.
		  Whaa dont tink ill on me.
		  Malediction',
      ]);
	  
	   DB::table('news')->insert([
          'title' => 'Bristleback here! Ha ha!',
          'body' => 'It s in the bag, mate. Yeah, go on, you see if it s not. Open it up and see if its not in there. Im telling you, its a lock, mate.',
      ]);
	  
	   DB::table('news')->insert([
          'title' => 'Zan karabos!!',
          'body' => 'Kar kor!
		  Zan!
		  kor!
		  Morakan!
		  Karabos karakas!
		  So sah zan!',
      ]);
	  
    }
}
