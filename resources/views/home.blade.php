<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <!-- Lien vers le CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background-color: #f8f9fa;
        }

        /* Personnalisation du logo */
        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }

        .navbar-brand span {
            color: #28a745; /* Green for emphasis */
        }

        /* Personnalisation des boutons */
        .btn-custom {
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 16px;
            font-weight: bold;
        }

        .btn-login {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .btn-register {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            opacity: 0.9;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .btn-custom {
                padding: 8px 15px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SMUR <span>Pontoise</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Options
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Autre action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Autre chose</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Rechercher</button>
      </form>
    </div>
  </div>
</nav>

<!-- Contenu principal -->
<div class="container text-center mt-5">
    <h1>Bienvenue sur notre site</h1>
    <p>Explorez nos services de location de panneaux et bien plus encore.</p>
    <!-- Boutons stylisés -->
    <a href="/login" class="btn btn-custom btn-login me-3">Connexion</a>
    <a href="/register" class="btn btn-custom btn-register">Inscription</a>
</div>

<!-- Lien vers les scripts Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
