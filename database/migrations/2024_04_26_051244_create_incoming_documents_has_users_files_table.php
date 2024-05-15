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
        Schema::create('incoming_documents_has_users_files', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('document_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('assigned_by')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('is_download', [0, 1])->nullable()->default(0);
            $table->enum('allow_share', [0, 1])->nullable()->default(0);
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
        Schema::dropIfExists('incoming_documents_has_users_files');
    }
};
