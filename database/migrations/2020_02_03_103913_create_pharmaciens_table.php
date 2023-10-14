<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmaciensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmaciens', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->date('dateNaissance')->nullable();
            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();
          
         

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmaciens');
    }
}
