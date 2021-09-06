<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_follows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_follow')->constrained('follows');
            $table->Date('Date'); 
            $table->integer('Turn'); 
            $table->integer('Time_Entry');
            $table->integer('Time_Departure');
            $table->string('Observation'); 
            
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
        Schema::dropIfExists('det_follows');
    }
}
