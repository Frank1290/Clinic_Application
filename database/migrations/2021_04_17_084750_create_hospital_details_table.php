<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_details', function (Blueprint $table) {
            $table->id();
            $table->string('hospital_name');
            $table->string('hospital_logo');
            $table->string('dr_name');
            $table->string('qualification');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('contact_1');
            $table->string('contact_2');
            $table->string('timing_1');
            $table->string('timing_2');
            $table->string('email');
            $table->string('regd_no');
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
        Schema::dropIfExists('hospital_details');
    }
}
