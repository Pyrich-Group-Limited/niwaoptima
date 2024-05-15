<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id');
            $table->foreignId('type_id'); //approval type id
            $table->bigInteger('requestable_id'); //approval dta|leave table id
            $table->string('requestable_type'); //dta | leave
            $table->integer('order');
            $table->foreignId('action_id');
            $table->tinyInteger('next_step')->nullable();
            $table->string('status')->default(false);
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
        Schema::dropIfExists('requests');
    }
}
