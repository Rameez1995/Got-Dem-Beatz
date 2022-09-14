<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('album_id')->nullable();
            $table->string('title');
            $table->string('image');
            $table->string('song_file');
            $table->string('price')->nullable();
            $table->string('bpm')->nullable();
            $table->string('producer_id');
            $table->string('min');
            $table->string('sec');
            $table->text('desc')->nullable();
            $table->text('lyrics')->nullable();
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
        Schema::dropIfExists('songs');
    }
}
