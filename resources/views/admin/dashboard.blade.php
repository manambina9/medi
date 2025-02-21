<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Admin</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #007bff;
            padding: 15px 20px;
            color: white;
            text-align: center;
            font-size: 18px;
        }

        .container {
            display: flex;
            margin: 20px auto;
            max-width: 1200px;
        }

        .sidebar {
            width: 250px;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-right: 20px;
            border-radius: 8px;
        }

        .sidebar h2 {
            font-size: 18px;
            margin-bottom: 20px;
            color: #007bff;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 10px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            padding: 10px;
            display: block;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #f1f1f1;
        }

        .content {
            flex: 1;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
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
</head>
<body>

<div class="navbar">
    Tableau de bord - Administration
</div>

<div class="container">
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="{{ route('admin.users.user') }}">Gestion des utilisateurs</a></li>
            <li><a href="#">Gestion des produits</a></li>
            <li><a href="#">Paramètres</a></li>
            <li><a href="#">Rapports</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Tableau de bord</h1>

        <div class="card">
            <h3>Utilisateurs</h3>
            <div class="action-buttons">
                <a href="{{ route('admin.users.user') }}">Voir les utilisateurs</a>
            </div>
        </div>

        <div class="card">
            <h3>Produits</h3>
            <div class="action-buttons">
                <a href="#">Voir les produits</a>
                <a href="#">Ajouter un produit</a>
            </div>
        </div>

        <div class="card">
            <h3>Commandes</h3>
            <div class="action-buttons">
                <a href="#">Voir les commandes</a>
                <a href="#">Ajouter une commande</a>
            </div>
        </div>
    </div>
</div>

<div class="back-link">
    <a href="#">Retour à l'accueil</a>
</div>

</body>
</html>
