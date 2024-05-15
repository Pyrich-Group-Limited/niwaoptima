<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procurements', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->foreignId('vendor_id')->constrained();
            $table->string('type')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->string('issue_date')->nullable();
            $table->string('reference_number')->nullable();
            $table->integer('status')->default(0);
            $table->string('unit_comment')->nullable();
            $table->string('hod_comment')->nullable();
            $table->string('audit_comment')->nullable();
            $table->string('legal_comment')->nullable();
            $table->string('finance_comment')->nullable();
            $table->string('md_comment')->nullable();

            $table->string('document')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procurements');
    }
}
