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
            <div class="table-responsive">
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
        z-index: 150; /* Augmenté pour être au-dessus de tout overlay */
        overflow-y: auto;
        transition: transform 0.3s ease;
    }

    /* S'assurer que tous les éléments de la sidebar sont cliquables */
    .sidebar * {
        position: relative;
        z-index: 151; /* Supérieur à la sidebar elle-même */
    }

    /* Style pour l'overlay */
    .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 149; /* Juste en-dessous de la sidebar */
        display: block;
    }

    /* Contenu principal */
    .content {
        flex: 1;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        margin-left: 300px; /* Décale encore plus le contenu pour plus d'espace */
        transition: margin-left 0.3s ease;
        position: relative;
        z-index: 100; /* Inférieur à la sidebar */
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
        flex-wrap: wrap;
    }

    .action-buttons a {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        margin-bottom: 5px;
    }

    .action-buttons a:hover {
        background-color: #0056b3;
    }

    /* Styles pour le tableau */
    .table-responsive {
        overflow-x: auto;
    }

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

    /* Toggle pour menu mobile */
    .menu-toggle {
        display: none;
        position: fixed;
        top: 15px;
        left: 15px;
        z-index: 300;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 8px 12px;
        cursor: pointer;
    }

    /* Media queries pour la responsivité */
    @media (max-width: 991px) {
        .menu-toggle {
            display: block;
        }

        .sidebar {
            transform: translateX(-100%);
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .content {
            margin-left: 0;
            padding: 15px;
        }
    }

    @media (max-width: 767px) {
        .card {
            padding: 10px;
        }

        .action-buttons {
            flex-direction: column;
        }

        .action-buttons a {
            width: 100%;
            text-align: center;
        }

        table th, table td {
            padding: 8px;
        }
    }

    @media (max-width: 480px) {
        .content h1 {
            font-size: 20px;
        }

        .card h3 {
            font-size: 16px;
        }
    }
</style>

<script>
    // Script amélioré pour le toggle du menu sur mobile avec overlay
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.querySelector('.sidebar');
        
        if (menuToggle && sidebar) {
            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                
                // Gestion de l'overlay
                if (sidebar.classList.contains('active')) {
                    // Créer un overlay seulement s'il n'existe pas déjà
                    if (!document.querySelector('.sidebar-overlay')) {
                        const overlay = document.createElement('div');
                        overlay.className = 'sidebar-overlay';
                        document.body.appendChild(overlay);
                        
                        // L'overlay ferme le menu quand on clique dessus
                        overlay.addEventListener('click', function() {
                            sidebar.classList.remove('active');
                            overlay.remove();
                        });
                    }
                } else {
                    // Supprimer l'overlay quand on ferme le menu
                    const overlay = document.querySelector('.sidebar-overlay');
                    if (overlay) {
                        overlay.remove();
                    }
                }
            });
        }
        
        // S'assurer que tous les liens de la sidebar sont cliquables
        const sidebarLinks = document.querySelectorAll('.sidebar a');
        sidebarLinks.forEach(link => {
            link.style.position = 'relative';
            link.style.zIndex = '155'; // Augmenter encore le z-index des liens
            
            // Ajouter un effet visuel au survol pour confirmer qu'ils sont cliquables
            link.addEventListener('mouseover', function() {
                this.style.opacity = '0.8';
            });
            
            link.addEventListener('mouseout', function() {
                this.style.opacity = '1';
            });
        });
    });
</script>
@endsection