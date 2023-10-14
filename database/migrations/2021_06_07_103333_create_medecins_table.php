<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedecinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medecins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
             $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('departement')->nullable();
            $table->date('dateNaissance')->nullable();
            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();
          
            $table->unsignedBigInteger('patient_id')->nullable();
        
            $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medecins');
    }
}
