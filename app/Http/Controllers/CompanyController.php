<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // Exibir uma lista de empresas
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    // Mostrar o formulário para criar uma nova empresa
    public function create()
    {
        $users = User::all();

        return view('companies.create', compact('users'));
    }

    // Armazenar uma nova empresa
    public function store(Request $request)
    {
        $request->validate([
            'razao_social' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'atividade_principal' => 'required|string|max:255',
            'cnae' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cep' => 'required|string|max:10',
            'cidade' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:15',
            'email' => 'required|email|max:255',
            'cnpj' => 'required|string|max:14',
            'tipo' => 'required|string|max:255',
            'ativo' => 'boolean',
            'responsavel' => 'nullable|string|max:255',
            'photo_path' => 'nullable|string|max:255',
        ]);

        Company::create($request->all());

        return redirect()->route('companies.index')->with('success', 'Empresa criada com sucesso.');
    }

    // Mostrar o formulário para editar uma empresa existente
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    // Atualizar uma empresa existente
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'razao_social' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'atividade_principal' => 'required|string|max:255',
            'cnae' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cep' => 'required|string|max:10',
            'cidade' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:15',
            'email' => 'required|email|max:255',
            'cnpj' => 'required|string|max:14',
            'tipo' => 'required|string|max:255',
            'ativo' => 'boolean',
            'responsavel' => 'nullable|string|max:255',
            'photo_path' => 'nullable|string|max:255',
        ]);

        $company->update($request->all());

        return redirect()->route('companies.index')->with('success', 'Empresa atualizada com sucesso.');
    }

    // Remover uma empresa existente
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Empresa excluída com sucesso.');
    }
}
