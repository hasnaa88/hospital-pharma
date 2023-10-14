<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_commandes', function (Blueprint $table) {
     
            $table->id();
                $table->unsignedBigInteger('commande_id')->nullable();
                $table->unsignedBigInteger('medicament_id')->nullable();
                $table->integer('quantiteCommande')->nullable();
    
                $table->foreign('medicament_id')->references('id')->on('medicaments')->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('commande_id')->references('id')->on('commandes')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('ligne_commandes');
    }
}
