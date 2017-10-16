<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uni_id')->unsigned()->nullable();
            $table->foreign('uni_id')->references('id')->on('universities')->onDelete('set null');
            $table->integer('app_id')->unsigned()->nullable();
            $table->foreign('app_id')->references('id')->on('applications')->onDelete('set null');
            $table->decimal('pts',5,2)->nullable();
            $table->smallInteger('year');
            $table->smallInteger('priority')->nullable();
            $table->boolean('sorted')->default('false');
            $table->integer('assigned')->nullable();
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
        Schema::dropIfExists('ranks');
    }
}
