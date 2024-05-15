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
        Schema::create('workflow_activities', function (Blueprint $table) {
            $table->id('id');
            $table->integer('status');
            $table->text('comment');
            $table->integer('action');
            $table->dateTime('action_date');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('workflow_step_id')->constrained('workflow_steps')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('workflow_instance_id')->constrained('workflow_instances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('workflow_activities');
    }
};
