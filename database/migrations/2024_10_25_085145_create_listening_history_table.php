<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('listening_history', function (Blueprint $table) {
            $table->biginteger('user_id')->references('user_id')->on('user_id')->onDelete('cascade');
            $table->biginteger('songs_id')->references('songs_id')->on('songs_id')->onDelete('cascade');
            $table->timestamp('played_at')->useCurrent();
            $table->primary(['user_id', 'songs_id', 'played_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('listening_history');
    }
};
