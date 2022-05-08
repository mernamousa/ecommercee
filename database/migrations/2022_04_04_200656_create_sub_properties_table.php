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
        Schema::create('sub_properties', function (Blueprint $table) {
            $table->id();
            $table->string('s_propertyName')->nullable();
            $table->string('s_propertyNameAr')->nullable();
            $table->string('s_propertyImage')->nullable();
            $table->unsignedBigInteger('prop_id')->nullable();

            $table->foreign('prop_id')
            ->references('id')
            ->on('properties')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('sub_properties');
    }
};
