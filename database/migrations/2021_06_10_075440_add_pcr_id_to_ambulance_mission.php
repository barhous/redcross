<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPcrIdToAmbulanceMission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ambulance_missions', function (Blueprint $table) {
            //
            $table->foreignId('pcr_id')->constrained('pcrs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ambulance_missions', function (Blueprint $table) {
            //
            $table->dropColumn('pcr_id');
        });
    }
}
