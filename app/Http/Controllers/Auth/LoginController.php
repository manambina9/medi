<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validation des informations d'authentification
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Si l'utilisateur est un admin, rediriger vers le tableau de bord admin
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');  // Tableau de bord admin
            }

            // Sinon, rediriger vers le tableau de bord utilisateur
            return redirect()->route('dashboard');  // Tableau de bord utilisateur
        }

        // Si l'authentification échoue, rediriger avec une erreur
        return redirect()->back()->withErrors(['email' => 'Les informations d\'identification sont incorrectes']);
    }

}
