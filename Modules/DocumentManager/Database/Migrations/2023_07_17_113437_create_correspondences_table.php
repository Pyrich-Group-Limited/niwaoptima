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
        Schema::create('correspondences', function (Blueprint $table) {
            $table->id('id');
            $table->text('subject');
            $table->datetime('date');
            $table->string('sender');
            $table->string('reference_number');
            $table->text('description');
            $table->text('comments')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('no action');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('no action');
            $table->foreignId('document_id')->constrained('documents');
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
        Schema::drop('correspondences');
    }
};
