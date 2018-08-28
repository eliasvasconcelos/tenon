<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(0);
            $table->integer('categoria_id')->default(0);
            $table->string('titulo')->nullable();
            $table->text('descricao')->nullable();
            $table->integer('uf_id')->default(0);
            $table->boolean('premium')->default(0);
            $table->string('status')->default('pendente');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('anuncios', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anuncios');
    }
}
