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
        Schema::create('item_props', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('item_id')->nullable();
            $table->unsignedBigInteger('prop_id')->nullable();
            $table->unsignedBigInteger('sub_prop_id')->nullable();

             $table->foreign('item_id')
            ->references('id')
            ->on('items')
            ->onUpdate('cascade')
            ->onDelete('cascade');


            $table->foreign('prop_id')
            ->references('id')
            ->on('properties')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('sub_prop_id')
            ->references('id')
            ->on('sub_properties')
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
        Schema::dropIfExists('item_props');
    }
};
