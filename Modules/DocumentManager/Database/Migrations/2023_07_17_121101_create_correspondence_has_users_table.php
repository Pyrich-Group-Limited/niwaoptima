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
        Schema::create('correspondence_has_users', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('correspondence_id')->constrained('correspondences');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('assigned_by')->constrained('users')->onDelete('no action');
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
        Schema::drop('correspondence_has_users');
    }
};
