<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void //instruções para a criação da tabela
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id(); //chave primária
            $table->string('titulo');
            $table->string('descricao');       //strings que definem o tipo de conteudo que será salvo
            $table->string('status');
            $table->timestamps();   //duas colunas que marcam o tempo de criação e edição
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void //reverta as operações do up()
    {
        Schema::dropIfExists('tarefas');
    }
};
