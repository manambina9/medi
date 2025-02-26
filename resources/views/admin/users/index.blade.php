@extends('admin.baseadmin')

@section('title', 'Gestion des utilisateurs')

@section('content')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 90%;
        max-width: 1200px;
        margin: 20px auto;
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        top: 60px;
        margin-left: 220px;  /* Espace laissé pour la sidebar */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: auto;
    }

    thead {
        background-color: #6c757d;
        color: white;
        font-size: 16px;
    }

    th, td {
        padding: 12px 15px;  /* Réduction du padding */
        text-align: left;
        border-bottom: 1px solid #ddd;
        font-size: 14px;
    }

    th {
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
        transform: translateY(-1px);
        transition: transform 0.2s ease-in-out;
    }

    td {
        color: #555;
    }

    .action-links {
        display: flex;
        gap: 10px;
    }

    .action-links a {
        display: inline-block;
        padding: 6px 12px;  /* Réduction de la taille du bouton */
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 12px;  /* Réduction de la taille de la police */
        transition: background-color 0.3s, transform 0.3s;
    }

    .action-links a:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .pagination {
        margin-top: 20px;
        text-align: center;
    }

    .pagination a {
        margin: 0 5px;
        padding: 8px 12px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
    }

    .pagination a:hover {
        background-color: #0056b3;
    }

    @media screen and (max-width: 768px) {
        .container {
            margin-left: 0;
            width: 100%;
            padding: 15px;
        }

        th, td {
            padding: 10px 12px;  /* Réduction du padding pour les petits écrans */
            font-size: 12px;  /* Réduction de la taille de la police */
        }

        th:nth-child(2),  /* Masquer la colonne "Prénom" */
        th:nth-child(5),
        th:nth-child(6),
        th:nth-child(7),
        th:nth-child(8),
        td:nth-child(2),  /* Masquer la colonne "Prénom" */
        td:nth-child(5),
        td:nth-child(6),
        td:nth-child(7),
        td:nth-child(8) {
            display: none;
        }

        .action-links {
            flex-direction: column;
            gap: 5px;
        }

        .action-links a {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Numéro</th>
                <th>Email</th>
                <th>Fonction</th>
                <th>Métier</th>
                <th>Bureau</th>
                <th>Dernière connexion</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->numero }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->fonction }}</td>
                <td>{{ $user->metier }}</td>
                <td>{{ $user->bureau }}</td>
                <td>{{ $user->last_login ? $user->last_login->format('d/m/Y H:i') : 'Jamais' }}</td>
                <td class="action-links">
                    <a href="{{ route('admin.users.edit', ['numero' => $user->numero]) }}">Modifier</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">
        <!-- Pagination links here -->
    </div>
</div>
@endsection