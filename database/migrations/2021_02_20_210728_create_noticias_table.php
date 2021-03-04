<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('foto_id');
            $table->string('fecha');
            $table->string('titulo');
            $table->longText('extracto');
            $table->longText('cuerpo');
            $table->boolean('state')/*->nullable()*/;
            $table->timestamps();


            // $table->foreign('foto_id')->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias');
    }
}
