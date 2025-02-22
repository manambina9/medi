
<header>
    <nav class="navbar">
        <!-- Section de gauche (Dashboard administrateur) -->
        <div class="navbar-left">
            <span>Dashboard Administrateur</span>
        </div>

        <!-- Section de droite (Utilisateur avec options) -->
        <div class="navbar-right">
            <div class="user-dropdown">
                <button class="dropdown-btn">Utilisateur</button>
                <div class="dropdown-content">
                    <a href="{{ route('user.profile') }}">Profil</a>
                    <!-- Formulaire de déconnexion -->
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: #007bff; font-size: 16px; cursor: pointer;">Déconnexion</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- CSS pour la Navbar -->
<style>
    /* Styles de base pour la navbar */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #007bff;
        padding: 10px 20px;
        color: white;
    }

    .navbar-left span {
        font-size: 18px;
        font-weight: bold;
    }

    .navbar-right {
        position: relative;
    }

    /* Style pour le bouton déroulant */
    .user-dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-btn {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 4px;
    }

    .dropdown-btn:hover {
        background-color: #0056b3;
    }

    /* Contenu du menu déroulant */
    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        font-size: 16px;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    /* Affichage du menu déroulant au survol */
    .user-dropdown:hover .dropdown-content {
        display: block;
    }
</style>

