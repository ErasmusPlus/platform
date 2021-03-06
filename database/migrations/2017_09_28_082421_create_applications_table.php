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

            $table->integer('lang_id1')->unsigned()->nullable();
            $table->foreign('lang_id1')->references('id')->on('languages')->onDelete('set null');
            $table->smallInteger('langlevel1')->unsigned()->nullable();

            $table->integer('lang_id2')->unsigned()->nullable();
            $table->foreign('lang_id2')->references('id')->on('languages')->onDelete('set null');
            $table->smallInteger('langlevel2')->unsigned()->nullable();

            $table->integer('lang_id3')->unsigned()->nullable();
            $table->foreign('lang_id3')->references('id')->on('languages')->onDelete('set null');
            $table->smallInteger('langlevel3')->unsigned()->nullable();

            $table->integer('u1_id')->unsigned()->nullable();
            $table->foreign('u1_id')->references('id')->on('universities')->onDelete('set null');
            $table->string('u1_studies')->nullable();
            $table->string('u1_semester')->nullable();
            $table->smallInteger('u1_months')->unsigned()->nullable();

            $table->integer('u2_id')->unsigned()->nullable();
            $table->foreign('u2_id')->references('id')->on('universities')->onDelete('set null');
            $table->string('u2_studies')->nullable();
            $table->string('u2_semester')->nullable();
            $table->smallInteger('u2_months')->unsigned()->nullable();


            $table->integer('u3_id')->unsigned()->nullable();
            $table->foreign('u3_id')->references('id')->on('universities')->onDelete('set null');
            $table->string('u3_studies')->nullable();
            $table->string('u3_semester')->nullable();
            $table->smallInteger('u3_months')->unsigned()->nullable();

            $table->boolean('l1');
            $table->boolean('l2');
            $table->boolean('l3');
            $table->boolean('l4');
            $table->boolean('l5');
            $table->boolean('l6');

            $table->integer('spec_aem');
            $table->integer('depID');
            $table->string('depname');
            $table->float('ects_passed_total', 8, 2);
            $table->integer('cources_passed_num');
            $table->smallInteger('curr_semester');
            $table->float('Avg', 5, 2);

            $table->smallInteger('additional_pts');
            $table->boolean('confirmed');

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
