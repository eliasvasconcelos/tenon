<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApitidaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apitidaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->string('sigla')->nullable();
            $table->string('categoria_nome')->nullable();
            $table->integer('categoria_id')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apitidaos');
    }
}
