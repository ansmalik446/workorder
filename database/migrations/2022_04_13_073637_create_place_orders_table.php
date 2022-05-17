<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_orders', function (Blueprint $table) {
            $table->id();
            $table->text('team_name')->nullable();
            $table->text('wo_id')->nullable();
            $table->text('file')->nullable();
            $table->text('po1')->nullable();
            $table->text('po2')->nullable();
            $table->text('po3')->nullable();
            $table->text('po4')->nullable();
            $table->text('notes')->nullable();
            $table->text('co1')->nullable();
            $table->text('co2')->nullable();
            $table->text('co3')->nullable();
            $table->text('co4')->nullable();
            $table->text('colo1')->nullable();
            $table->text('colo2')->nullable();
            $table->text('colo3')->nullable();
            $table->text('logo1')->nullable();
            $table->text('loc1')->nullable();
            $table->text('loc2')->nullable();
            $table->text('loc3')->nullable();
            $table->text('size1')->nullable();
            $table->text('size2')->nullable();
            $table->text('size3')->nullable();
            
            
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
        Schema::dropIfExists('place_orders');
    }
}
