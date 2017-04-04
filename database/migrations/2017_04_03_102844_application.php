<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Application extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('applications', function (Blueprint $table) {
            $table->string('emailacc')->unique();
            $table->string('name');
            $table->string('lname');
			$table->string('idnum');
			$table->string('dob');
			$table->string('pob');
			$table->string('resplace');
			$table->string('numstreet');
			$table->string('postalcode');
            $table->string('tel');
			$table->string('mobile');
			$table->string('mail');
			$table->string('typestudent');
			$table->string('yearun');
			$table->string('univ');
			$table->string('dep');
			$table->string('country');
			$table->string('past');
			$table->text('aboutme');
			 $table->timestamps();
			   
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
