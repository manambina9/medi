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
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background-color: #6c757d;
        color: white;
        font-size: 16px;
    }

    th, td {
        padding: 16px 20px;
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
        padding: 8px 14px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 13px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .action-links a:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .action-links a:active {
        background-color: #004085;
    }

    .action-links a i {
        margin-right: 5px;
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

    /* Ajustements pour la navigation à côté */
    .container {
        margin-left: 300px
        ;  /* Espace laissé pour la sidebar */
    }

    /* Responsive design pour les petits écrans */
    @media screen and (max-width: 768px) {
        .container {
            margin-left: 0; /* Retire le décalage pour les petits écrans */
            width: 100%;
            padding: 15px;
        }

        table {
            font-size: 14px;
        }

        th, td {
            padding: 10px 15px;
        }

        .action-links a {
            font-size: 12px;
            padding: 6px 12px;
        }
    }
</style>

<div class="container">
    <table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Email</th>
        <th>Numéro</th>
        <th>Prénom</th>
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
        <td>{{ $user->email }}</td>
        <td>{{ $user->numero }}</td>
        <td>{{ $user->firstname }}</td>
        <td>{{ $user->fonction }}</td>
        <td>{{ $user->metier }}</td>
        <td>{{ $user->bureau }}</td>
        <td>{{ $user->last_login ? $user->last_login->format('d/m/Y H:i') : 'Jamais' }}</td>
        <td>
            <a href="{{ route('admin.users.edit', $user->numero) }}" class="btn btn-warning">Modifier</a>
        </td>
    </tr>
    @endforeach
</tbody>

    </table>

    <div class="pagination">
        <!-- Exemple de pagination (si tu utilises la pagination) -->
    </div>
</div>

@endsection
