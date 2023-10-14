<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdonnancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordonnances', function (Blueprint $table) {
            $table->id();
            $table->date('dateOrdonnace')->nullable();
            $table->string('titreOrdonnace')->nullable();
            $table->unsignedBigInteger('medicament_id')->nullable();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->unsignedBigInteger('medecin_id')->nullable();
            $table->string('description')->nullable();
            $table->integer('nombreFoisMedicament')->nullable();
            $table->integer('duree_usage')->nullable();
            $table->timestamps();
         
            $table->foreign('medicament_id')->references('id')->on('medicaments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('medecin_id')->references('id')->on('medecins')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordonnances');
    }
}
