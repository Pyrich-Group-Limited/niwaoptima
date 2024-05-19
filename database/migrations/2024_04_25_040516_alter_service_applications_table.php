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
        Schema::create('service_applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_id');
            $table->tinyInteger('application_form_payment_status')->default(0);
            $table->dateTime('date_of_inspection')->nullable();
            $table->string('service_type_id');
            $table->bigInteger('branch_id')->nullable();
            $table->string('applicant_code')->nullable();
            $table->string('serviceapplication_code')->nullable();
            $table->timestamps();
        });
        /* Schema::table('service_applications', function (Blueprint $table) {
            $table->bigInteger('branch_id')->nullable();
            $table->string('applicant_code')->nullable();
            $table->string('serviceapplication_code')->nullable();
        }); */
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
