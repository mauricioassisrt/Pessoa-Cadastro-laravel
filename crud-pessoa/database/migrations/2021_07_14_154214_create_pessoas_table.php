<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // os tipos é definidos aqui é criados no banco

        Schema::create('pessoas', function (Blueprint $table) {

            $table->id();
            $table->string("nome");
            $table->string("sobre_nome");
            $table->date("nascimento");
            $table->char("sexo");
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
        Schema::dropIfExists('pessoas');
    }
}
