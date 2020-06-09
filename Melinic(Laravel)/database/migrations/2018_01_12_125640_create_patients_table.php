<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_patients_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('issued');
            $table->string('phone_number');
            $table->tinyInteger('age');
            $table->string('sex')->default('other');
            $table->boolean('disease_experience')->default(false);
            $table->boolean('insured')->default(false);
            $table->string('kind_of_insured')->default('N');
            $table->date('insured_expiration_date');
            $table->string('doc_token', 6)->unique();
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
        Schema::dropIfExists('general_patients_info');
    }
}
