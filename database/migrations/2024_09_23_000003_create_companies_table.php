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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('razao_social');
            $table->string('name');
            $table->string('atividade_principal');
            $table->string('cnae');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('cep');
            $table->string('cidade');
            $table->string('telefone');
            $table->string('email');
            $table->string('cnpj');
            $table->string('tipo');
            $table->boolean('ativo')->default(true);
            $table->string('id_manager')->nullable();
            $table->string('photo_path')->nullable();
            $table->timestamp('ultima_atualizacao')->nullable(); // Add this line
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
