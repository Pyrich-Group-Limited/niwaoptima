<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
            Schema::create('staff', function($table) {
    
                $table->bigIncrements('id');
                $table->unsignedBigInteger('user_id')->nullable();
                $table->foreign('user_id')->references('id') ->on('users')->onDelete('cascade');
                $table->unsignedBigInteger('department_id')->nullable();
                $table->unsignedBigInteger('ranking_id')->nullable();
                $table->foreign('ranking_id')->references('id')->on('rankings')->onDelete('set null');

                $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
                $table->unsignedBigInteger('branch_id')->nullable();
                $table->foreign('branch_id')->references('id')->on('branches')->onDelete('set null');
                $table->integer('dash_type')->nullable();
                $table->string('gender')->nullable();
                $table->string('staff_id')->nullable();
                $table->string('region')->nullable();
                $table->string('phone')->nullable();
                $table->string('profile_picture')->nullable();
                $table->string('status')->nullable();
                $table->integer('statusz')->nullable()->default(1);
                $table->string('alternative_email')->nullable();
                $table->string('created_by')->nullable();
                $table->string('date_approved')->nullable();
                $table->string('approved_by')->nullable();
               $table->string('security_key')->nullable();
                $table->string('date_modified')->nullable();
                $table->text('modified_by')->nullable();
                $table->text('office_position')->nullable();
                $table->text('position')->nullable();
                $table->text('about_me')->nullable();
                $table->string('total_received_email')->nullable();
                $table->string('total_sent_email')->nullable();
                $table->string('total_draft_email')->nullable();
                $table->string('total_event')->nullable();
                $table->text('my_groups')->nullable();
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
