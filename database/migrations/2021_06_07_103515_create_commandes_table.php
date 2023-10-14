<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->date('dateCommande')->nullable();
            $table->unsignedBigInteger('pharmacien_id')->nullable();
            $table->unsignedBigInteger('fournisseur_id')->nullable();
            $table->boolean('valide')->default(false)->nullable();
            $table->timestamps();

            $table->foreign('pharmacien_id')->references('id')->on('pharmaciens')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
