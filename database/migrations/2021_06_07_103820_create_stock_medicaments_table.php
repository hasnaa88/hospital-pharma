<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockMedicamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_medicaments', function (Blueprint $table) {
            $table->id();
            $table->date('dateEntre')->nullable();
          $table->unsignedBigInteger('medicament_id');
          $table->unsignedBigInteger('pharmacien_id');
            $table->integer('quantite')->nullable();
           $table->foreign('medicament_id')->references('id')->on('medicaments')->
           onUpdate('cascade')->onDelete('cascade');
           $table->foreign('pharmacien_id')->references('id')->on('pharmaciens')->
           onUpdate('cascade')->onDelete('cascade');


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
        Schema::dropIfExists('stock_medicaments');
    }
}
