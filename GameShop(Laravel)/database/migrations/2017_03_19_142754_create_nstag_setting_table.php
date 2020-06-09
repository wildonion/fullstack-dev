<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNstagSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nstag_setting', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('page');
            $table->string('meta_desc');
            $table->string('meta_descF_User');
            $table->string('tags');
            $table->string('tagsF_User');   
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nstag_setting');
    }
}

