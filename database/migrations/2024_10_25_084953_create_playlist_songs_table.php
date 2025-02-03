<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('playlist_songs', function (Blueprint $table) {
            $table->biginteger('playlist_id')->references('playlist_id')->on('playlists')->onDelete('cascade');
            $table->biginteger('songs_id')->references('songs_id')->on('songs')->onDelete('cascade');
            $table->timestamp('added_at')->useCurrent();
            $table->primary(['playlist_id', 'songs_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('playlist_songs');
    }
};

