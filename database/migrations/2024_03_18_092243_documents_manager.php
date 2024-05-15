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
        
        Schema::create('documents_manager', function (Blueprint $table) {
            $table->id('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('document_url')->nullable();
            $table->bigInteger('category_id')->nullable();
            //$table->bigInteger('role_id')->nullable();
            $table->bigInteger('created_by')->nullable();
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
