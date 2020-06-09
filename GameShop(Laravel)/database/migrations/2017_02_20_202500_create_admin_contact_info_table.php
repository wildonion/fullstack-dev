<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminContactInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_contact_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('full_name');
            $table->string('instagram');
            $table->string('telegram');
            $table->string('facebook');
            $table->string('gmail');
            $table->string('email');
            $table->string('compony')->nullable();
            $table->string('picture')->nullable();
            $table->text('about_me')->nullable();
            $table->text('about_meF_User')->nullable();
            $table->string('phone_number')->nullable();
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
        Schema::dropIfExists('admin_contact_info');
    }
}
