<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->enum('tipo_vaga', ['PJ', 'CLT', 'Estágio']);
            $table->decimal('salario', 10, 2)->nullable();
            $table->integer('horario')->nullable();
            $table->timestamps();
    
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vagas');
    }
}
