<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id(); // ID auto-incremental
            $table->string('razao_social'); // Razão social
            $table->string('name'); // Nome do estabelecimento
            $table->string('atividade_principal'); // Atividade principal
            $table->string('cnae'); // CNAE
            $table->string('endereco'); // Endereço
            $table->string('bairro'); // Bairro
            $table->string('cep'); // CEP
            $table->string('cidade'); // Cidade
            $table->string('telefone')->nullable(); // Telefone
            $table->string('email')->unique(); // E-mail
            $table->string('cnpj')->unique(); // CNPJ
            $table->string('tipo'); // Tipo
            $table->boolean('ativo')->default(true); // Ativo
            $table->string('responsavel'); // Responsável
            $table->timestamps(); // Cria created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
