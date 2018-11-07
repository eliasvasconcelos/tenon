<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescricaoAnuncioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descricao_anuncios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('anuncio_id')->unsigned()->default(0);
            $table->text('descricao')->nullable();
            $table->string('valor')->default(0);
            $table->string('tipo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('descricao_anuncios', function($table) {
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
        Schema::dropIfExists('descricao_anuncios');
    }
}
