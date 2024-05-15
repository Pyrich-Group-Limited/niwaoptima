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
        //
        Schema::create('monitoring_fees_table', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_id')->nullable();
            $table->string('name')->nullable();
            $table->string('amount')->nullable();
            $table->bigInteger('branch_id')->nullable();
            $table->bigInteger('processing_type_id')->nullable();
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
        //
    }
};
