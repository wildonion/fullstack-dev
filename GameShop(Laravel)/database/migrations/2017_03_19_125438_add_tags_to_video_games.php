<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagsToVideoGames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_games', function (Blueprint $table) {
            $table->string('tags')->after('title');
            $table->string('tagsF_User')->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_games', function (Blueprint $table) {
            $table->dropColumn('tags');
            $table->dropColumn('tagsF_User');
        });
    }
}
