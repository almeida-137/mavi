<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',                // Nome do produto
        'description',         // Descrição do produto
        'price',               // Preço do produto
        'stock',               // Estoque disponível
        'category_id',         // Refere-se à categoria
        'company_id',          // Refere-se à empresa
        'group_id',            // Refere-se ao grupo de empresas
        'image',               // URL da imagem do produto
        'is_available',        // Indica se o produto está disponível
        'ingredients',         // Ingredientes do produto, caso aplicável
        'nutrition_info',      // Informações nutricionais, caso necessário
        'preparation_time',     // Tempo de preparo estimado
        'tags'                 // Tags para facilitar a busca
    ];

    // Definir a relação com a categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Definir a relação com a empresa
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Definir a relação com o grupo de empresas
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
