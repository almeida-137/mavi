<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory; // Incluir o HasProfilePhoto

    protected $fillable = [
        'razao_social',
        'name',
        'atividade_principal',
        'cnae',
        'cnpj',
        'endereco',
        'bairro',
        'cep',
        'cidade',
        'telefone',
        'email',
        'tipo',
        'ativo',
        'responsavel',
        'photo_path',
    ];

    // Atualiza a data da última atualização antes de salvar
    public static function boot()
    {
        parent::boot();

        static::saving(function ($company) {
            $company->ultima_atualizacao = now();
        });
    }
}
