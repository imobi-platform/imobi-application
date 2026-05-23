<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->String('tipo', 20)->default('fisica');

            $table->string('nome_completo');
            $table->string('razao_social')->nullable();
            $table->string('nome_fantasia')->nullable();
            
            $table->string('cpf_cnpj')->nullable();

            $table->string('email', 150)->nullable();
            $table->string('telefone')->nullable();
            $table->string('whatsapp')->nullable();

            $table->string('cep', 20)->nullable();
            $table->string('logradouro', 200)->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('cidade', 100)->nullable();
            $table->string('estado', 2)->nullable();
            
            $table->string('status', 30)->default('ativo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};
