<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetaDescToLatestNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('latest_news', function (Blueprint $table) {
            $table->string('meta_desc')->after('title');
            $table->string('meta_descF_User')->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('latest_news', function (Blueprint $table) {
            $table->dropColumn('meta_desc');
            $table->dropColumn('meta_descF_User');
        });
    }
}
