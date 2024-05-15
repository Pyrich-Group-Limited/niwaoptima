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
        Schema::table('documents_has_roles', function($table) {
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('is_download', [0, 1])->nullable()->default(0);
        });
        Schema::table('documents_has_users', function($table) {
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('is_download', [0, 1])->nullable()->default(0);
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
