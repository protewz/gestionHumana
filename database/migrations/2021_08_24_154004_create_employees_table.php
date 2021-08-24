<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('Name'); 
            $table->string('Surnames');
            $table->string('Ident_Card');
            $table->string('Phone');
            $table->string('Mail');
            $table->string('Adrres');
            $table->Date('Date_Birth');
            $table->string('Post');
            $table->Date('Date_Admission');
            $table->Date('Date_Retirement');
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
        Schema::dropIfExists('employees');
    }
}
