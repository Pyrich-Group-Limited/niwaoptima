<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::table('dta_reviews', function (Blueprint $table) {
            $table->foreignId('dta_id')->nullable()->constrained('dta_requests')->onDelete('cascade');
              $table->foreignId('officer_id')->nullable()->constrained('departments')->onDelete('cascade');

        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
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
