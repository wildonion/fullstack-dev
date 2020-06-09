<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorPresenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_presence', function (Blueprint $table) { // doctor fill up these credentials
            $table->increments('id');
            $table->string('address_url_token');
            $table->string('days')->default('default');
            $table->time('from')->default(000000);
            $table->time('till')->default(000000);
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
        Schema::dropIfExists('doctor_presence');
    }
}
