<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    public function update(UpdateRequest $request)
    {
        $data = $request->validated();
        auth()->user()->update($data);

        return redirect('/tasks')->with('success', 'Usuário atualizado com sucesso.');
    }

    public function confirm()
    {
        return view('user.confirm');
    }

    public function destroy(Request $request)
    {
        if(!Hash::check($request->password, auth()->user()->password))
        {
            return back()->withErrors([
                'password' => 'Senha incorreta.'
            ]);
        }
        
        $user = auth()->user();
        $user->delete();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/register')->with('success', 'Conta excluida com sucesso.');
    }
}
