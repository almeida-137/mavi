<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // ID auto-incremental
            $table->string('name'); // Nome da categoria
            $table->text('description')->nullable(); // Descrição da categoria
            $table->timestamps(); // Cria created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
