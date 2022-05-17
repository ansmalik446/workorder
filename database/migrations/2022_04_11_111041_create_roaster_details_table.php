<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoasterDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roaster_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('roaster_id');

            $table->foreign('roaster_id')->references('id')->on('roasters')->onDelete('cascade');
            $table->integer('number')->nullable();
            $table->string('name')->nullable();
            $table->string('top_size')->nullable();
            $table->string('bottom_size')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('roaster_details');
    }
}
