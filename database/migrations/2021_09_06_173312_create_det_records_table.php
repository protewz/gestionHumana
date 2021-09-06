<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_record')->constrained('records');
            $table->Date('Registration_Date');
            $table->integer('Time_Entry');
            $table->integer('Time_Departure');
            $table->string('Observation'); 
            $table->string('Place'); 
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
        Schema::dropIfExists('det_records');
    }
}


