<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) { // doctor table
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('presence_now')->default(true);
            $table->string('doc_picture')->nullable();
            $table->string('specialties');
            $table->string('room_to_visit');
            $table->string('url_token', 6)->unique();
            $table->string('address_url_token', 6)->unique()->default(str_random(6));
            $table->float('price_of_free_visit', 8, 5)->default(00000000.00000);
            $table->float('total_earn_till_now', 8, 5)->default(00000000.00000); // will update every time after he/she visited her/his patient
            $table->longtext('doc_description');
            $table->date('insured_expiration_date');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
