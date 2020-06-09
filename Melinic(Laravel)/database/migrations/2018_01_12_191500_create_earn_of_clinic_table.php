<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEarnOfClinicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earn_of_clinic', function (Blueprint $table) { // this table only accepts update query not insert! 
            $table->increments('id');
            $table->float('total_earn', 8, 5)->default(00000000.00000); // will update to default or truncate every month
            // will update after every visit
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
        Schema::dropIfExists('earn_of_clinic');
    }
}
