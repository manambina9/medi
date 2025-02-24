<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Liste des utilisateurs.
     */
    public function user()
    {
        $users = User::all();  // Récupère tous les utilisateurs
        return view('admin.users.index', compact('users'));
    }

    /**
     * Tableau de bord Admin.
     */
    public function dashboard()
    {
        $userCount = User::count(); // Récupère le nombre total d'utilisateurs
        return view('admin.dashboard', compact('userCount'));
    }

    /**
     * Formulaire de modification d'un utilisateur.
     */
    public function edit($numero)
    {
        // Trouver l'utilisateur à modifier
        $user = User::where('numero',$numero)->firstOrFail();

        // Retourner la vue avec les données de l'utilisateur
        return view('admin.users.edit', compact('user'));

    }

    /**
     * Mettre à jour un utilisateur.
     */
    public function update(Request $request, $numero)
    {
        // Validation des champs
        $request->validate([
            'name'      => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $numero . ',numero',
            'mailpro'   => 'nullable|email|unique:users,mailpro,' . $numero . ',numero',
            'telephone' => 'required|string|max:20|unique:users,telephone,' . $numero . ',numero',
            'fonction'  => 'required|string|max:50',
            'metier'    => 'required|string|max:50',
            'bureau'    => 'required|string|max:50',
            'role'      => 'required|in:user,admin',
        ]);

        // Trouver l'utilisateur
        $user = User::where('numero', $numero)->firstOrFail();

        // Mettre à jour les données
        $user->update([
            'name'      => $request->name,
            'firstname' => $request->firstname,
            'email'     => $request->email,
            'mailpro'   => $request->mailpro,
            'telephone' => $request->telephone,
            'fonction'  => $request->fonction,
            'metier'    => $request->metier,
            'bureau'    => $request->bureau,
            'role'      => $request->role,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }
}
