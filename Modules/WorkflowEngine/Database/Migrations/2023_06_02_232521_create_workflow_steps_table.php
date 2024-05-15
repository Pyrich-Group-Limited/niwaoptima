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
        Schema::create('workflow_steps', function (Blueprint $table) {
            $table->id('id');
            $table->integer('step_order');
            $table->string('step_name');
            $table->foreignId('workflow_id')->constrained('workflows')->onDelete('cascade');
            $table->foreignId('parent_step_id')->nullable()->constrained('workflow_steps')->onDelete('cascade');
            $table->foreignId('next_approved_id')->nullable()->constrained('workflow_steps')->onDelete('cascade');
            $table->foreignId('next_rejected_id')->nullable()->constrained('workflow_steps')->onDelete('cascade');
            $table->foreignId('actor_type_id')->constrained('actor_types')->onDelete('cascade');
            $table->foreignId('actor_role_id')->constrained('actor_roles')->onDelete('cascade');
            $table->foreignId('step_activity_id')->constrained('step_activities')->onDelete('cascade');
            $table->foreignId('step_type_id')->constrained('step_types')->onDelete('cascade');
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
        Schema::drop('workflow_steps');
    }
};
