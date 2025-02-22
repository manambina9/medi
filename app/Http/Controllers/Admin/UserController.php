<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;  // Assurez-vous que Request est bien importé
use App\Models\User;

class UserController extends Controller
{
    public function user()
    {
        $users = User::all();  // Récupère tous les utilisateurs
        return view('admin.users.index', compact('users'));
    }
    public function dashboard()
    {
        
        $userCount = User::count(); // Récupère le nombre d'utilisateurs
        return view('admin.dashboard', compact('userCount'));
    }

    // Autres méthodes...

    public function edit($numero)
    {
        // Trouver l'utilisateur à modifier
        $user = User::findOrFail($numero);

        // Retourner la vue avec les données de l'utilisateur
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $numero)
    {
        // Valider les données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $numero,
            'role' => 'required|in:user,admin',
        ]);

        // Trouver l'utilisateur
        $user = User::findOrFail($numero);

        // Mettre à jour les données de l'utilisateur
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        // Rediriger après la mise à jour
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }
}
