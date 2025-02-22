@extends('admin.baseadmin')

@section('title', 'Dashboard Administrateur')

@section('content')
<div class="container">
    <div class="content">
        <h1>Tableau de bord</h1>

        <!-- Card pour les utilisateurs -->
        <div class="card">
            <h3>Utilisateurs</h3>
            <div class="action-buttons">
                <a href="{{ route('admin.users.index') }}">Voir les utilisateurs</a>
            </div>
        </div>

        <!-- Nouveau tableau pour afficher des données -->
        <div class="card">
            <h3>Statistiques</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom de la statistique</th>
                        <th>Valeur</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nombre d'utilisateurs inscrits</td>
                        <td>{{ $userCount }}</td> <!-- Exemple d'insertion dynamique -->
                    </tr>
                    <!-- Ajoutez d'autres lignes pour d'autres statistiques -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
    }

    /* Navbar ajustée */
    .navbar {
        background-color: #007bff;
        padding: 15px 20px;
        color: white;
        text-align: center;
        font-size: 18px;
        position: fixed;
        width: 100%;
        z-index: 200;
    }

    /* Container pour le contenu de la page */
    .container {
        display: flex;
        margin-top: 60px; /* Pour éviter que le contenu ne se superpose avec la navbar */
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
        position: fixed;
        top: 60px; /* Décale la sidebar sous la navbar */
        left: 0;
        height: calc(100% - 60px); /* Limite la hauteur de la sidebar */
        z-index: 100;
        overflow-y: auto;
    }

    /* Contenu principal */
    .content {
        flex: 1;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        margin-left: 300px; /* Décale encore plus le contenu pour plus d'espace */
    }

    .content h1 {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    .card {
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .card h3 {
        font-size: 18px;
        color: #007bff;
    }

    .card p {
        font-size: 16px;
        color: #555;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
    }

    .action-buttons a {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .action-buttons a:hover {
        background-color: #0056b3;
    }

    /* Styles pour le tableau */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #f1f1f1;
        color: #007bff;
    }

    /* Back link (optionnel) */
    .back-link {
        display: block;
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
    }

    .back-link a {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }

    .back-link a:hover {
        text-decoration: underline;
    }
</style>

@endsection
