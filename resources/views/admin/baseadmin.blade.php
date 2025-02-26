<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dashboard administrateur">
    <meta name="author" content="">

    <title>@yield('title', 'Administration')</title>

    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #007bff;
            --primary-hover: #0056b3;
            --text-color: #333;
            --navbar-height: 60px;
            --sidebar-width: 250px;
            --transition-speed: 0.3s;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 1rem;
            line-height: 1.5;
            color: var(--text-color);
            background-color: #f8f9fa;
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        /* ===================== NAVBAR STYLES ===================== */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--primary-color);
            color: white;
            height: var(--navbar-height);
            padding: 0 1.25rem;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-left {
            display: flex;
            align-items: center;
        }
        
        .sidebar-toggle {
            background: transparent;
            border: none;
            color: white;
            font-size: 1.25rem;
            margin-right: 1rem;
            cursor: pointer;
            padding: 0.25rem;
            display: none;
        }
        
        .navbar-title {
            font-size: 1.125rem;
            font-weight: bold;
        }
        
        .navbar-right {
            display: flex;
            align-items: center;
        }
        
        .user-dropdown {
            position: relative;
        }
        
        .dropdown-btn {
            background: transparent;
            border: none;
            color: white;
            padding: 0.5rem 0.75rem;
            font-size: 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            border-radius: 4px;
        }
        
        .dropdown-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .dropdown-icon {
            margin-left: 0.5rem;
            border: solid white;
            border-width: 0 2px 2px 0;
            display: inline-block;
            padding: 2px;
            transform: rotate(45deg);
            transition: transform var(--transition-speed);
        }
        
        .dropdown-btn.active .dropdown-icon {
            transform: rotate(-135deg);
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: white;
            min-width: 160px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            z-index: 1001;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .dropdown-content a {
            color: var(--text-color);
            padding: 0.75rem 1rem;
            text-decoration: none;
            display: block;
            font-size: 0.875rem;
        }
        
        .dropdown-content a:hover {
            background-color: #f5f5f5;
        }
        
        .dropdown-content form {
            margin: 0;
        }
        
        .dropdown-content button {
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            color: #dc3545;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            cursor: pointer;
        }
        
        .dropdown-content button:hover {
            background-color: #f5f5f5;
        }
        
        .dropdown-content.active {
            display: block;
        }
        
        /* ===================== SIDEBAR STYLES ===================== */
        .sidebar {
            width: var(--sidebar-width);
            background-color: white;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.05);
            position: fixed;
            top: var(--navbar-height);
            left: 0;
            bottom: 0;
            z-index: 900;
            overflow-y: auto;
            transition: transform var(--transition-speed) ease;
        }
        
        .sidebar-header {
            padding: 1.25rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .sidebar-header h2 {
            margin: 0;
            font-size: 1.25rem;
            color: var(--primary-color);
        }
        
        .sidebar-close {
            background: none;
            border: none;
            color: var(--text-color);
            font-size: 1.5rem;
            cursor: pointer;
            display: none;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0.75rem 0;
        }
        
        .sidebar-item a {
            display: flex;
            align-items: center;
            padding: 0.875rem 1.25rem;
            color: var(--text-color);
            text-decoration: none;
            transition: background-color var(--transition-speed), color var(--transition-speed);
            position: relative;
        }
        
        .sidebar-item a:hover {
            background-color: #f5f8ff;
        }
        
        .sidebar-item a.active {
            background-color: var(--primary-color);
            color: white;
        }
        
        .sidebar-item a.active:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background-color: var(--primary-hover);
        }
        
        .sidebar-item i {
            width: 1.5rem;
            text-align: center;
            margin-right: 0.75rem;
            font-size: 0.875rem;
        }
        
        /* ===================== CONTENT WRAPPER ===================== */
        .content-wrapper {
            padding: 1.5rem;
            padding-top: calc(var(--navbar-height) + 1.5rem);
            min-height: calc(100vh - var(--navbar-height));
            transition: margin-left var(--transition-speed) ease;
        }
        
        /* ===================== OVERLAY ===================== */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 899;
            display: none;
            opacity: 0;
            transition: opacity var(--transition-speed) ease;
        }
        
        /* ===================== FOOTER ===================== */
        .footer {
            background-color: white;
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
            border-top: 1px solid #eee;
        }
        
        /* ===================== RESPONSIVE STYLES ===================== */
        @media (max-width: 992px) {
            :root {
                --sidebar-width: 220px;
            }
        }
        
        @media (max-width: 768px) {
            :root {
                --sidebar-width: 260px;
            }
            
            .sidebar-toggle {
                display: block;
            }
            
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .sidebar-close {
                display: block;
            }
            
            .content-wrapper {
                margin-left: 0;
            }
            
            body.sidebar-open {
                overflow: hidden;
            }
            
            body.sidebar-open .sidebar-overlay {
                display: block;
                opacity: 1;
            }
            
            .dropdown-content {
                position: fixed;
                width: 100%;
                left: 0;
                right: 0;
                top: var(--navbar-height);
                border-radius: 0;
            }
        }
        
        @media (max-width: 480px) {
            :root {
                --sidebar-width: 85vw;
            }
            
            .navbar {
                padding: 0 0.75rem;
            }
            
            .navbar-title {
                font-size: 1rem;
                max-width: 150px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            
            .dropdown-btn span {
                display: none;
            }
            
            .dropdown-btn:after {
                content: "\f007";
                font-family: "Font Awesome 5 Free";
                font-weight: 900;
            }
        }
        
        /* ===================== UTILITIES ===================== */
        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #eee;
        }
        
        .page-title {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
        }
        
        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s, background-color 0.15s, border-color 0.15s;
            text-decoration: none;
        }
        
        .btn-primary {
            color: #fff;
            background-color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }
        
        .mb-4 {
            margin-bottom: 1.5rem;
        }
        
        .scroll-to-top {
            position: fixed;
            right: 1rem;
            bottom: 1rem;
            width: 2.75rem;
            height: 2.75rem;
            background-color: rgba(0, 123, 255, 0.5);
            color: white;
            border-radius: 0.25rem;
            text-align: center;
            line-height: 2.75rem;
            text-decoration: none;
            display: none;
            z-index: 1010;
            transition: background-color 0.3s;
        }
        
        .scroll-to-top:hover {
            background-color: var(--primary-color);
        }
        
        .scroll-to-top.show {
            display: block;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-left">
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <span class="navbar-title">Dashboard Administrateur</span>
        </div>
        
        <div class="navbar-right">
            <div class="user-dropdown">
                <button class="dropdown-btn" id="userDropdownBtn">
                    <span>Utilisateur</span>
                    <span class="dropdown-icon"></span>
                </button>
                <div class="dropdown-content" id="userDropdownContent">
                    <a href="{{ route('user.profile') }}">
                        <i class="fas fa-user"></i> Profil
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">
                            <i class="fas fa-sign-out-alt"></i> Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h2>Menu</h2>
            <button class="sidebar-close" id="sidebarClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <ul class="sidebar-menu">
            <li class="sidebar-item">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>
            
            <li class="sidebar-item">
                <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    <span>Gestion des utilisateurs</span>
                </a>
            </li>
            
            <li class="sidebar-item">
                <a href="#" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <i class="fas fa-box"></i>
                    <span>Gestion des produits</span>
                </a>
            </li>
            
            <li class="sidebar-item">
                <a href="#" class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i>
                    <span>Paramètres</span>
                </a>
            </li>
            
            <li class="sidebar-item">
                <a href="#" class="{{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                    <i class="fas fa-chart-bar"></i>
                    <span>Rapports</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Overlay pour mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Content Wrapper -->
    <div class="content-wrapper" id="contentWrapper">
        <!-- Content -->
        @yield('content')

        <!-- Footer -->
        
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top" href="#page-top" id="scrollToTop">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Scripts JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Éléments de la navbar
            const userDropdownBtn = document.getElementById('userDropdownBtn');
            const userDropdownContent = document.getElementById('userDropdownContent');
            
            // Éléments de la sidebar
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarClose = document.getElementById('sidebarClose');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            
            // Bouton de retour en haut
            const scrollToTopBtn = document.getElementById('scrollToTop');
            
            // Toggle du menu utilisateur
            if (userDropdownBtn && userDropdownContent) {
                userDropdownBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    userDropdownBtn.classList.toggle('active');
                    userDropdownContent.classList.toggle('active');
                });
            }
            
            // Fonctions pour la sidebar
            function openSidebar() {
                sidebar.classList.add('active');
                document.body.classList.add('sidebar-open');
            }
            
            function closeSidebar() {
                sidebar.classList.remove('active');
                document.body.classList.remove('sidebar-open');
            }
            
            // Toggle de la sidebar
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (sidebar.classList.contains('active')) {
                        closeSidebar();
                    } else {
                        openSidebar();
                    }
                });
            }
            
            // Fermeture de la sidebar
            if (sidebarClose) {
                sidebarClose.addEventListener('click', function(e) {
                    e.preventDefault();
                    closeSidebar();
                });
            }
            
            // Fermer la sidebar quand on clique sur l'overlay
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', function() {
                    closeSidebar();
                });
            }
            
            // Gérer le bouton retour en haut
            if (scrollToTopBtn) {
                window.addEventListener('scroll', function() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        scrollToTopBtn.classList.add('show');
                    } else {
                        scrollToTopBtn.classList.remove('show');
                    }
                });
                
                scrollToTopBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
            
            // Fermer les menus dropdown quand on clique ailleurs
            document.addEventListener('click', function(e) {
                // Fermer le dropdown utilisateur
                if (userDropdownContent && userDropdownBtn && !e.target.closest('.user-dropdown') && userDropdownContent.classList.contains('active')) {
                    userDropdownBtn.classList.remove('active');
                    userDropdownContent.classList.remove('active');
                }
            });
            
            // Ajuster le comportement en fonction de la taille de l'écran
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768 && sidebar && sidebar.classList.contains('active')) {
                    closeSidebar();
                }
            });
        });
    </script>

    @yield('scripts')
</body>
</html>