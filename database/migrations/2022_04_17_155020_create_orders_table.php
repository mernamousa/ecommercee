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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('new');
            $table->integer('total_price')->nullable();
            $table->string('ship_address')->nullable();
            $table->string('ship_date')->nullable();
            //$table->id('delivery_id');
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('orders');
    }
};
