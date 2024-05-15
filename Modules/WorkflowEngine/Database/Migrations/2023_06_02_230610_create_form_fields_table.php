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
        Schema::create('form_fields', function (Blueprint $table) {
            $table->id('id');
            $table->string('field_name');
            $table->string('field_label');
            $table->text('field_options')->nullable();
            $table->integer('is_required');
            $table->timestamps();
            $table->foreignId('form_id')->constrained('forms')->onDelete('cascade');
            $table->unique(['form_id', 'field_name']);
            $table->foreignId('field_type_id')->constrained('field_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('form_fields');
    }
};
