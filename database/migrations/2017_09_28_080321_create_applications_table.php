<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname_el');
            $table->string('name_el');
            $table->string('surname_en');
            $table->string('name_en');
            $table->string('fathersname');
            $table->string('mothersname');
            $table->smallInteger('age')->unsigned();
            $table->string('idno');
            $table->string('birthplace');
            $table->string('birthdate');
            $table->string('prefecture');
            $table->string('citizenship');

            $table->string('address_el');
            $table->string('nο_el');
            $table->string('city_el');
            $table->string('tk');
            $table->string('address_en');
            $table->string('city_en');

            $table->string('tel');
            $table->string('mobtel');
            $table->string('email');
            $table->boolean('publictel');
            $table->string('insurance');

            $table->string('department');
            $table->string('semester');
            $table->string('stlevel');

            $table->string('langlevel1');
            $table->string('langlevel2');
            $table->string('langlevel3');

            $table->string('u1_name');
            $table->string('u1_studies');
            $table->string('u1_semester');
            $table->smallInteger('u1_months')->unsigned();

            $table->string('u2_name');
            $table->string('u2_studies');
            $table->string('u2_semester');
            $table->smallInteger('u2_months')->unsigned();


            $table->string('u3_name');
            $table->string('u3_studies');
            $table->string('u3_semester');
            $table->smallInteger('u3_months')->unsigned();

            $table->boolean('l1');
            $table->boolean('l2');
            $table->boolean('l3');
            $table->boolean('l4');
            $table->boolean('l5');
            $table->boolean('l6');

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
