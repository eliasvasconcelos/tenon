<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnuncioFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncio_fotos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('anuncio_id')->unsigned()->default(0);
            $table->longText('base64')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('anuncio_fotos', function($table) {
            $table->foreign('anuncio_id')->references('id')->on('anuncios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anuncio_fotos');
    }
}
