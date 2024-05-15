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
        Schema::create('document_versions', function (Blueprint $table) {
            $table->id('id');
            $table->integer('version_number');
            $table->foreignId('document_id')->constrained('documents');
            $table->string('document_url');
            $table->foreignId('created_by')->constrained('users')->onDelete('no action');
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
        Schema::drop('document_versions');
    }
};
