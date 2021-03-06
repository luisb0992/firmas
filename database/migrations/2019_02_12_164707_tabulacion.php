<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabulacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabulacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('municipio');
            $table->string('electores');
            $table->string('porcentaje');
            $table->string('cuadernillo');
            $table->string('firmas');
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
        Schema::dropIfExists('tabulacion');
    }
}
