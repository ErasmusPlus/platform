<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUniversity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
              Schema::table('universities', function (Blueprint $table) {
        $table->string('tmhma')->nullable();
        $table->boolean('jsflag')->nullable();
       
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('universities', function (Blueprint $table) {
        $table->dropColumn('tmhma');
        $table->dropColumn('jsflag');
      
      });
    }
}
