<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('titleFUser');
            $table->string('picture_game_n1');
            $table->string('picture_game_n2')->nullable();
            $table->string('picture_game_n3')->nullable();
            $table->string('picture_game_n4')->nullable();
            $table->string('picture_game_n5')->nullable();
            $table->string('picture_game_n6')->nullable();
            $table->string('caption_n2')->nullable();
            $table->string('caption_n3')->nullable();
            $table->string('caption_n4')->nullable();
            $table->string('caption_n2F_User')->nullable();
            $table->string('caption_n3F_User')->nullable();
            $table->string('caption_n4F_User')->nullable();
            $table->integer('picture_game_n2_status')->default(0);
            $table->integer('picture_game_n3_status')->default(0);
            $table->integer('picture_game_n4_status')->default(0);
            $table->integer('picture_game_n5_status')->default(0);
            $table->integer('picture_game_n6_status')->default(0);
            $table->string('video_game')->nullable();
            $table->longtext('description');
            $table->longtext('descriptionFUser');
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
        Schema::dropIfExists('video_games');
    }
}
