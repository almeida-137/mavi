<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Execute as migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Cria a coluna 'id' como chave primária
            $table->string('name'); // Nome do produto
            $table->text('description')->nullable(); // Descrição do produto
            $table->decimal('price', 10, 2); // Preço do produto
            $table->integer('stock')->default(0); // Estoque disponível
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Referência à tabela categories
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade'); // Referência à tabela companies
            $table->foreignId('group_id')->nullable()->constrained('groups')->onDelete('set null'); // Referência à tabela groups, pode ser nula
            $table->string('image')->nullable(); // URL da imagem do produto
            $table->boolean('is_available')->default(true); // Indica se o produto está disponível
            $table->text('ingredients')->nullable(); // Ingredientes do produto
            $table->text('nutrition_info')->nullable(); // Informações nutricionais
            $table->integer('preparation_time')->nullable(); // Tempo de preparo em minutos
            $table->string('tags')->nullable(); // Tags para busca
            $table->timestamps(); // Cria created_at e updated_at
        });
    }

    /**
     * Reverse as migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products'); // Remove a tabela products
    }
}
