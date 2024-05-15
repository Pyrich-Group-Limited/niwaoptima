<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateUnitHeadsAndUnitsAndUsersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('unit_heads');
        Schema::dropIfExists('units');

        Schema::create('unit_heads', function (Blueprint $table) {
            $table->id();
            //$table->dropColumn('name');
            $table->foreignId('unit_id')->nullable()->constrained('units')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
    });
    Schema::create('units', function (Blueprint $table) {
        $table->id();
        $table->string('unit_name')->nullable();
        $table->timestamps();
        $table->softDeletes();
    });

    Schema::table('users', function (Blueprint $table) {
        //$table->dropColumn('unit_head_id');
        $table->foreignId('unit_id')->nullable()->constrained('units')->onDelete('cascade');
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
        
        /* Schema::table('', function (Blueprint $table) {

        }); */
    }
}
