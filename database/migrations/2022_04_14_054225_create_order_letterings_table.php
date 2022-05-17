<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLetteringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_letterings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('place_orders')->onDelete('cascade');;
            $table->text('location')->nullable();
            $table->text('text')->nullable();
            $table->text('font_name')->nullable();
            $table->text('main_color')->nullable();
            $table->text('trim_color')->nullable();
            $table->text('size')->nullable();
            $table->text('type')->nullable();
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
        Schema::dropIfExists('order_letterings');
    }
}
