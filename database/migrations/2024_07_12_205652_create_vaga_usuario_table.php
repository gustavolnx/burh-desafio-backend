<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVagaUsuarioTable extends Migration
{
    public function up()
    {
        Schema::create('vaga_usuario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vaga_id')->constrained()->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vaga_usuario');
    }
}
