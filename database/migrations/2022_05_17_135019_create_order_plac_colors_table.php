<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPlacColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_plac_colors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('place_order_id');
            $table->foreign('place_order_id')->references('id')->on('place_orders')->onDelete('cascade');
            $table->string('product_option')->nullable();
            $table->string('poductid')->nullable();
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
        Schema::dropIfExists('order_plac_colors');
    }
}
