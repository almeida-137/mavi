<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    // Aqui você pode adicionar relações, se necessário
    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
