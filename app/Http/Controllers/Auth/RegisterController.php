<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     */
    public function showRegistrationForm()
    {
        return view('register'); // Charge la vue Blade register.blade.php
    }

    /**
     * Gère l'inscription de l'utilisateur.
     */
    public function register(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hacher le mot de passe
            'role' => 'user', // Ajout d'un rôle par défaut
        ]);

        // Connexion automatique après inscription
        \Illuminate\Support\Facades\Auth::login($user);

        return redirect()->route('dashboard'); // Redirection après inscription
    }
}
