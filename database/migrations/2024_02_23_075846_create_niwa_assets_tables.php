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
        Schema::create('niwa_assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('supplierid');
            $table->unsignedBigInteger('typeid');
            $table->unsignedBigInteger('brandid');
            $table->string('assettag', 50);
            $table->string('name', 255);
            $table->string('serial', 255);
            $table->string('quantity', 10);
            $table->date('purchasedate');
            $table->string('cost', 10);
            $table->string('warranty', 5);
            $table->string('status', 20);
            $table->text('picture')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('locationid');
            $table->integer('checkstatus');
        });

        Schema::create('asset_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('assetid');
            $table->integer('employeeid');
            $table->date('date');
            $table->string('status', 50);
            $table->timestamps();
            $table->foreign('assetid')->references('id')->on('niwa_assets')->onDelete('cascade');
        });

        Schema::create('asset_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('brand', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('component', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('supplierid');
            $table->unsignedBigInteger('typeid');
            $table->unsignedBigInteger('brandid');
            $table->string('name', 255);
            $table->string('serial', 255);
            $table->string('quantity', 10);
            $table->date('purchasedate');
            $table->string('cost', 10);
            $table->string('warranty', 5);
            $table->string('status', 20);
            $table->text('picture')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('locationid');
            $table->integer('checkstatus');
        });

        Schema::create('component_assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('assetid');
            $table->unsignedBigInteger('componentid');
            $table->integer('quantity');
            $table->timestamps();
            $table->string('status', 50);
            $table->date('date');
            $table->foreign('assetid')->references('id')->on('niwa_assets')->onDelete('cascade');
            $table->foreign('componentid')->references('id')->on('component')->onDelete('cascade');
        });

        Schema::create('location', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('maintenance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('assetid');
            $table->integer('supplierid');
            $table->date('startdate');
            $table->date('enddate');
            $table->string('type', 255);
            $table->timestamps();
        });

        Schema::create('supplier', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('city', 255);
            $table->string('country', 255)->nullable();
            $table->string('zip', 10)->nullable();
            $table->string('phone', 20);
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('supplier');
        Schema::dropIfExists('maintenance');
        Schema::dropIfExists('location');
        Schema::dropIfExists('component_assets');
        Schema::dropIfExists('component');
        Schema::dropIfExists('brand');
        Schema::dropIfExists('asset_type');
        Schema::dropIfExists('asset_history');
        Schema::dropIfExists('niwa_assets');
    }
};
