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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_type_id')->index();
            $table->foreign('property_type_id')->references('id')->on('property_types')->cascadeOnDelete();
            $table->unsignedBigInteger('location_id')->index();
            $table->foreign('location_id')->references('id')->on('locations')->cascadeOnDelete();
            $table->unsignedBigInteger('owner_type_id')->index();
            $table->foreign('owner_type_id')->references('id')->on('owner_types')->cascadeOnDelete();
            $table->unsignedInteger('rent')->default(0);
            $table->unsignedInteger('area')->default(0);
            $table->unsignedInteger('repair')->default(0);
            $table->text('description');
            $table->boolean('credit')->default(0)->index();
            $table->unsignedInteger('price')->default(0);
            $table->unsignedInteger('documents')->default(0);
            $table->unsignedInteger('viewed')->default(0);
            $table->string('name_tm');
            $table->string('name_en')->nullable();
            $table->string('slug')->unique();
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
        Schema::dropIfExists('properties');
    }
};
