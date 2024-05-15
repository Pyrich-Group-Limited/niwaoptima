<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_applications', function (Blueprint $table) {
            //
            $table->string('demand_total')->nullable();
            $table->bigInteger('axis_id')->nullable();
            $table->dateTime('expiry_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_applications', function (Blueprint $table) {
            //
        });
    }
};
