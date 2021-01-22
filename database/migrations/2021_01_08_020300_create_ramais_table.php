<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRamaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ramais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("usuario_id");
            $table->unsignedBigInteger("empresa_id");
            $table->unsignedBigInteger("setor_id");
            $table->integer("ramal");
            $table->integer("telefone_externo")->nullable();
            $table->string("nome_maquina")->unique();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("usuario_id")->references("id")->on("usuarios");
            $table->foreign("empresa_id")->references("id")->on("empresas");
            $table->foreign("setor_id")->references("id")->on("setores");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ramais');
    }
}
