<header>
    <nav class="navbar">
        <!-- Section de gauche (Dashboard administrateur) -->
        <div class="navbar-left">
            <span>Dashboard Administrateur</span>
        </div>

        <!-- Bouton toggle pour mobile -->
        <button class="mobile-toggle" id="sidebarToggle">
            <span class="toggle-icon"></span>
        </button>

        <!-- Section de droite (Utilisateur avec options) -->
        <div class="navbar-right">
            <div class="user-dropdown">
                <button class="dropdown-btn" id="userDropdownBtn">
                    <span class="user-name">Utilisateur</span>
                    <i class="dropdown-icon"></i>
                </button>
                <div class="dropdown-content" id="userDropdownContent">
                    <a href="{{ route('user.profile') }}">Profil</a>
                    <!-- Formulaire de déconnexion -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">Déconnexion</button>
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
        padding: 0.75rem 1.25rem;
        color: white;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .navbar-left span {
        font-size: 1.125rem;
        font-weight: bold;
    }

    .navbar-right {
        display: flex;
        align-items: center;
    }

    /* Bouton mobile toggle */
    .mobile-toggle {
        display: none;
        background: transparent;
        border: none;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
        padding: 0.5rem;
    }

    .toggle-icon {
        display: block;
        width: 1.5rem;
        height: 2px;
        background: white;
        position: relative;
        transition: all 0.3s;
    }

    .toggle-icon:before,
    .toggle-icon:after {
        content: '';
        position: absolute;
        width: 100%;
        height: 2px;
        background: white;
        transition: all 0.3s;
    }

    .toggle-icon:before {
        top: -6px;
    }

    .toggle-icon:after {
        bottom: -6px;
    }

    /* Style pour le bouton déroulant */
    .user-dropdown {
        position: relative;
    }

    .dropdown-btn {
        display: flex;
        align-items: center;
        background-color: transparent;
        color: white;
        border: none;
        padding: 0.625rem;
        font-size: 1rem;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.2s;
    }

    .dropdown-btn:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .dropdown-icon {
        display: inline-block;
        margin-left: 0.5rem;
        border: solid white;
        border-width: 0 2px 2px 0;
        padding: 3px;
        transform: rotate(45deg);
        transition: transform 0.2s;
    }

    .dropdown-btn.active .dropdown-icon {
        transform: rotate(-135deg);
    }

    /* Contenu du menu déroulant */
    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        top: 100%;
        background-color: #fff;
        min-width: 200px;
        border-radius: 4px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        z-index: 1010;
        overflow: hidden;
    }

    .dropdown-content a {
        color: #333;
        padding: 0.75rem 1rem;
        text-decoration: none;
        display: block;
        font-size: 0.875rem;
        transition: background-color 0.2s;
    }

    .dropdown-content a:hover {
        background-color: #f5f5f5;
    }

    .dropdown-content form {
        margin: 0;
    }

    .logout-btn {
        width: 100%;
        text-align: left;
        background: none;
        border: none;
        color: #dc3545;
        font-size: 0.875rem;
        cursor: pointer;
        padding: 0.75rem 1rem;
        transition: background-color 0.2s;
    }

    .logout-btn:hover {
        background-color: #f5f5f5;
    }

    /* Affichage du menu déroulant avec la classe active */
    .dropdown-content.active {
        display: block;
    }

    /* Media queries améliorées */
    @media (max-width: 992px) {
        .navbar-left span {
            font-size: 1rem;
        }
    }

    @media (max-width: 768px) {
        .navbar {
            padding: 0.625rem 1rem;
        }

        .mobile-toggle {
            display: block;
            order: 1;
        }

        .navbar-left {
            order: 2;
            flex-grow: 1;
            text-align: center;
        }

        .navbar-right {
            order: 3;
        }

        .navbar-left span {
            max-width: 180px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-dropdown {
            position: static;
        }

        .dropdown-content {
            position: absolute;
            width: 100%;
            left: 0;
            right: 0;
            top: 100%;
            border-radius: 0;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
    }

    @media (max-width: 480px) {
        .navbar {
            padding: 0.5rem 0.75rem;
        }

        .navbar-left span {
            font-size: 0.875rem;
            max-width: 140px;
        }

        .dropdown-btn {
            padding: 0.5rem;
        }

        .user-name {
            display: none;
        }

        .dropdown-btn::after {
            content: "\f007";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
        }
    }

    /* Animation pour sidebar toggle */
    .sidebar-toggled .toggle-icon {
        background: transparent;
    }

    .sidebar-toggled .toggle-icon:before {
        transform: rotate(45deg);
        top: 0;
    }

    .sidebar-toggled .toggle-icon:after {
        transform: rotate(-45deg);
        bottom: 0;
    }

    /* Styles pour gérer la transition du sidebar */
    #wrapper {
        transition: padding-left 0.3s ease;
    }

    #sidebar-wrapper {
        transition: all 0.3s ease;
    }

    @media (max-width: 768px) {
        #sidebar-wrapper {
            transform: translateX(-100%);
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 999;
        }

        .sidebar-toggled #sidebar-wrapper {
            transform: translateX(0);
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 998;
        }

        .sidebar-toggled .sidebar-overlay {
            display: block;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sélection des éléments
        const userDropdownBtn = document.getElementById('userDropdownBtn');
        const userDropdownContent = document.getElementById('userDropdownContent');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const wrapper = document.getElementById('wrapper');
        
        // Créer un élément overlay pour le sidebar mobile
        const overlay = document.createElement('div');
        overlay.className = 'sidebar-overlay';
        wrapper.appendChild(overlay);

        // Toggle du menu utilisateur
        userDropdownBtn.addEventListener('click', function(e) {
            e.preventDefault();
            userDropdownBtn.classList.toggle('active');
            userDropdownContent.classList.toggle('active');
        });

        // Toggle du sidebar
        sidebarToggle.addEventListener('click', function(e) {
            e.preventDefault();
            wrapper.classList.toggle('sidebar-toggled');
            sidebarToggle.classList.toggle('active');
        });

        // Fermer les menus quand on clique à l'extérieur
        document.addEventListener('click', function(e) {
            // Fermer le dropdown utilisateur
            if (!e.target.closest('.user-dropdown') && userDropdownContent.classList.contains('active')) {
                userDropdownBtn.classList.remove('active');
                userDropdownContent.classList.remove('active');
            }
            
            // Fermer le sidebar via l'overlay
            if (e.target.classList.contains('sidebar-overlay') && wrapper.classList.contains('sidebar-toggled')) {
                wrapper.classList.remove('sidebar-toggled');
                sidebarToggle.classList.remove('active');
            }
        });

        // Ajuster le comportement en fonction de la taille de l'écran
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768 && wrapper.classList.contains('sidebar-toggled')) {
                wrapper.classList.remove('sidebar-toggled');
                sidebarToggle.classList.remove('active');
            }
        });
    });
</script>