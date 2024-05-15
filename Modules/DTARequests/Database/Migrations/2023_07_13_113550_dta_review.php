<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DtaReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('dta_reviews', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('dtarequest_id')->nullable()->constrained('dta_requests')->onDelete('cascade');
              $table->foreignId('staff_id')->nullable()->constrained('staff')->onDelete('cascade');


            $table->string('comments')->nullable();
            $table->string('review_status')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dta_reviews');
    }
}
