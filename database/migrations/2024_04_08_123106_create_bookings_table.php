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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('id');
            $table->string('departure_time')->nullable();
            $table->string('departure_day')->nullable();
            $table->integer('departure_state')->nullable();
            $table->integer('no_of_passengers')->nullable();
            $table->string('trip_duration')->nullable();
            $table->string('trip_type')->nullable();
            $table->string('price')->nullable();
            $table->string('arrival_time')->nullable();
            $table->string('arrival_day')->nullable();
            $table->integer('arrival_state')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('discount')->nullable();
            $table->string('tax')->nullable();
            $table->string('levy')->nullable();
            $table->string('vat')->nullable();
            $table->string('total')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bookings');
    }
};
