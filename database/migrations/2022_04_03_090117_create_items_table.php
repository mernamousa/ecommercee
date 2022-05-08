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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('itemName')->nullable();
            $table->string('itemNameAr')->nullable();
            $table->text('itemDesc')->nullable();
            $table->text('itemDescAr')->nullable();
            $table->string('itemImage')->nullable();
            $table->integer('itemPrice')->default(1);
            $table->integer('itemDiscount')->default(0);
            $table->enum('discountType',['fixed','percent'])->default('percent');
            $table->boolean('itemAvailable')->default(true);

            $table->unsignedBigInteger('sub_cat_id')->nullable();
            $table->foreign('sub_cat_id')
            ->references('id')
            ->on('sub_categories')
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
        Schema::dropIfExists('items');
    }
};
