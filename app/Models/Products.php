<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'stock', 'category'
    ];

    // Definir qualquer relação, por exemplo, relação com uma categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
