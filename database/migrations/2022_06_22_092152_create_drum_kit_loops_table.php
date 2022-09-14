<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrumKitLoopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drum_kit_loops', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('file');
            $table->string('genre_id')->nullable();
            $table->string('strikethrough_price')->nullable();
            $table->string('price');
            $table->string('type');
            $table->text('desc')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('drum_kit_loops');
    }
}
