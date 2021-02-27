<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            $table->string('codigo');
            $table->string('modelo');
            $table->string('fabricante');
            $table->longText('descripcion');
            $table->string('imagen');
            $table->integer('stock');
            $table->string('estado');

            $table->unsignedBigInteger('localizacion_id');
            $table->foreign('localizacion_id')->references('id')->on('localizaciones')->onDelete('cascade');

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
        Schema::dropIfExists('productos');
    }
}
