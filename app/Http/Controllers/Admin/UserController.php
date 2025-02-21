<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    
    public function index()
    {
        return view('admin.dashboard');
    }
    public function user()
    {

        $users = User::paginate(10); // 10 utilisateurs par page
        return view('admin.users.index', compact('users'));
    }

    // Afficher le formulaire de modification d'un utilisateur
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Mettre à jour un utilisateur
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());  // Assure-toi de valider les données avant
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès');
    }
}
