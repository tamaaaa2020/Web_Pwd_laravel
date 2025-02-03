<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id('songs_id');
            $table->biginteger('albums_id')->references('albums_id')->on('albums')->onDelete('cascade');
            $table->string('title');
            $table->integer('duration');
            $table->string('genre')->nullable();
            $table->date('release_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('songs');
    }
};
