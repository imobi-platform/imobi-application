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
        Schema::create('corretores', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pessoa_id')->index();

            $table->string('nome_profissional', 150);
            $table->text('biografia')->nullable();
            $table->text('avatar_url')->nullable();
            
            $table->string('status', 30)->default('ativo');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corretores');
    }
};
