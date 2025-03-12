<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class User extends Controller
{
    public function pesquisa()
    {
        $title = 'Página de Pesquisa - Loja';

        return view ('pesquisa', ['title' => $title]);
    }

    public function carrinho(Request $request)
    {
        $title = 'Carrinho - Loja';

        return view ('carrinho', ['title' => $title]);
    }

    public function deslogar(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function logar()
    {
        return view('auth/login');
    }
}
