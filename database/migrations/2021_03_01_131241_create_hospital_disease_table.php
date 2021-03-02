<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalDiseaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('hospital_diseases', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('hospital_id');
            $table->string('disease');
//            $table->unsignedInteger('disease_id');
//            $table->foreign('disease_id')->references('id')->on('diseases');
            $table->foreign('hospital_id')->references('id')->on('hospitals');

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
        Schema::dropIfExists('hospital_disease');
    }
}
