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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->integer('quantity')->default(1);
            $table->unsignedBigInteger('order_id');

            $table->foreign('order_id')
            ->references('id')
            ->on('orders')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('item_id')->nullable();
            $table->foreign('item_id')
            ->references('id')
            ->on('items')
            ->onUpdate('cascade')
            ->onDelete('cascade');


            $table->unsignedBigInteger('sub_prop_id')->nullable();
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
        Schema::dropIfExists('order_items');
    }
};
