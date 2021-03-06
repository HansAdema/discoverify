<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrateChannelsTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlist_user_channel', function (Blueprint $table) {
            $table->unsignedInteger('playlist_id');
            $table->unsignedInteger('user_channel_id');

            $table->foreign('playlist_id')->references('id')->on('playlists');
            $table->foreign('user_channel_id')->references('id')->on('user_channels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('playlist_user_channel');
    }
}
