<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAmkaToApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('applications', function (Blueprint $table) {
        $table->string('amka');
        $table->string('iddate');
        $table->string('idloc');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('applications', function (Blueprint $table) {
        $table->dropColumn('amka');
        $table->dropColumn('iddate');
        $table->dropColumn('idloc');
      });
    }
}
