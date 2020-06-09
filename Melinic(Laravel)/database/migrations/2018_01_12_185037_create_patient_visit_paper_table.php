<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientVisitPaperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_visit_paper', function (Blueprint $table) { // this table will truncate everyday!
            $table->increments('id');
            $table->integer('patient_id');
            $table->integer('doctor_id');
            $table->string('room');
            $table->float('total_price', 8, 5)->default(00000000.00000); // this also will update "total_earn_till_now" field in doctors table every moment
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
        Schema::dropIfExists('patient_visit_paper');
    }
}
