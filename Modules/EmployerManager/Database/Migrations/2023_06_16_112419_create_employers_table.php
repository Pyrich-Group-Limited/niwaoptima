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
        Schema::create('employers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->string('applicant_code')->nullable();
            $table->string('ecs_number')->nullable();
            $table->string('company_name');
            $table->string('company_email');
            $table->longText('company_address');
            $table->string('company_rcnumber');
            $table->string('cac_reg_year')->nullable();
            $table->string('contact_position')->nullable();
            $table->string('contact_number');
            $table->string('company_localgovt')->nullable();
            $table->integer('company_state')->nullable();
            $table->integer('number_of_employees')->nullable();
            $table->string('business_area')->nullable();
            $table->string('inspection_status')->nullable();
            $table->string('status')->nullable();
            $table->string('registered_date')->nullable();
            $table->string('contact_surname');
            $table->string('contact_firstname');
            $table->string('contact_middlename')->nullable();
            $table->string('company_phone')->nullable();
            $table->integer('branch_id')->unsigned()->nullable();
            $table->integer('region_id')->unsigned()->nullable();
            $table->integer('transaction_id')->unsigned()->nullable();
            $table->integer('contribution_id')->unsigned()->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
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
        Schema::drop('employers');
    }
};
