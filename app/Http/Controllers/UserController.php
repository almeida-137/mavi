<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
        // return view('laravel-examples.users-management', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate(User::$rules);

    //     $validatedData['password'] = Hash::make($validatedData['password']);

    //     User::create($validatedData);

    //     return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso.');
    // }
    public function store(Request $request)
    {
        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'user_type' => 'required|string|in:customer,admin',
            'active' => 'nullable|boolean',
            'company' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Criação do usuário
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'user_type' => $request->user_type,
            'active' => $request->active ? 1 : 0,
            'company' => $request->company,
        ]);
    
        // Redirecionamento com mensagem de sucesso
        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
    }


    public function show(User $user)
    {
        return view('laravel-examples.users-show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('laravel-examples.users-edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate(array_merge(User::$rules, [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed', // A senha pode ser nula, se não for alterada
        ]));

        if ($validatedData['password']) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso.');
    }
}
