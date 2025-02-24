<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     */
    public function showRegistrationForm()
    {
        return view('register'); // Charge la vue register.blade.php
    }

    /**
     * Gère l'inscription de l'utilisateur.
     */
    public function register(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'name'       => 'required|string|max:255',
            'firstname'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'mailpro'    => 'nullable|string|email|max:255|unique:users,mailpro',
            'telephone'  => 'required|string|max:20|unique:users',
            'fonction'   => 'required|string|max:50',
            'metier'     => 'required|string|max:50',
            'bureau'     => 'required|string|max:50',
            'role'       => 'required|string|in:admin,user', // Validation du rôle
            'password'   => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Veuillez corriger les erreurs ci-dessous.');
        }

        try {
            // Création de l'utilisateur avec le champ rôle
            $user = User::create([
                'name'       => $request->name,
                'firstname'  => $request->firstname,
                'email'      => $request->email,
                'mailpro'    => $request->mailpro,
                'telephone'  => $request->telephone,
                'fonction'   => $request->fonction,
                'metier'     => $request->metier,
                'bureau'     => $request->bureau,
                'role'       => $request->role, // Stocke le rôle sélectionné
                'password'   => Hash::make($request->password),
            ]);

            // Connexion automatique après inscription
            Auth::login($user);

            // Message de succès
            Session::flash('success', 'Inscription réussie ! Bienvenue.');

            return redirect()->route('dashboard'); // Redirection vers le tableau de bord
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }
}
