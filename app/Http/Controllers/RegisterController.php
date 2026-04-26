<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\registerRequest;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.registerForm');
    }

    public function store(registerRequest $request)
    {
        $data = $request->validated();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('/login')->with('success', 'Usuário cadastrado com sucesso, faça login.');
    }
}
