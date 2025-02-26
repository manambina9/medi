<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h2>Menu</h2>
        <button class="sidebar-close" id="sidebarClose">×</button>
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

<!-- Content wrapper -->
<div class="content-wrapper" id="contentWrapper">
    <!-- Le contenu de la page sera ici -->
    @yield('content')
</div>

<style>
    :root {
        --sidebar-width: 250px;
        --navbar-height: 60px;
        --primary-color: #007bff;
        --text-color: #333;
        --hover-bg: #f5f8ff;
        --active-bg: #007bff;
        --active-text: #fff;
        --sidebar-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        --sidebar-mobile-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        --transition-speed: 0.3s;
    }

    /* Base styles */
    body {
        overflow-x: hidden;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }

    /* Sidebar styles */
    .sidebar {
        width: var(--sidebar-width);
        background-color: #fff;
        box-shadow: var(--sidebar-shadow);
        position: fixed;
        top: var(--navbar-height);
        left: 0;
        bottom: 0;
        z-index: 900;
        overflow-y: auto;
        transition: transform var(--transition-speed) ease, width var(--transition-speed) ease;
    }

    .sidebar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.25rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .sidebar-header h2 {
        font-size: 1.25rem;
        margin: 0;
        color: var(--primary-color);
        font-weight: 600;
    }

    .sidebar-close {
        display: none;
        background: none;
        border: none;
        color: var(--text-color);
        font-size: 1.5rem;
        cursor: pointer;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        line-height: 1;
    }

    .sidebar-menu {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-item {
        margin: 0;
    }

    .sidebar-item a {
        display: flex;
        align-items: center;
        padding: 0.875rem 1.25rem;
        color: var(--text-color);
        text-decoration: none;
        transition: background-color var(--transition-speed) ease, color var(--transition-speed) ease;
        position: relative;
    }

    .sidebar-item a:hover {
        background-color: var(--hover-bg);
    }

    .sidebar-item a.active {
        background-color: var(--active-bg);
        color: var(--active-text);
    }

    .sidebar-item a.active:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background-color: #0056b3;
    }

    .sidebar-item i {
        width: 1.5rem;
        text-align: center;
        margin-right: 0.75rem;
        font-size: 0.875rem;
    }

    /* Content wrapper */
    .content-wrapper {
        margin-left: var(--sidebar-width);
        padding: 1.5rem;
        padding-top: calc(var(--navbar-height) + 1.5rem);
        min-height: calc(100vh - var(--navbar-height));
        transition: margin-left var(--transition-speed) ease;
    }

    /* Sidebar overlay for mobile */
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

    /* Responsive Design */
    @media (max-width: 992px) {
        :root {
            --sidebar-width: 220px;
        }
        
        .sidebar-item a {
            padding: 0.75rem 1rem;
        }
    }

    @media (max-width: 768px) {
        :root {
            --sidebar-width: 260px;
        }
        
        .sidebar {
            transform: translateX(-100%);
            box-shadow: var(--sidebar-mobile-shadow);
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
    }

    @media (max-width: 480px) {
        :root {
            --sidebar-width: 85vw;
        }
        
        .sidebar-item a {
            padding: 0.75rem 1rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Éléments de la sidebar
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const sidebarClose = document.getElementById('sidebarClose');
        const sidebarToggle = document.getElementById('sidebarToggle'); // Bouton dans la navbar
        
        // Fonction pour ouvrir la sidebar sur mobile
        function openSidebar() {
            sidebar.classList.add('active');
            document.body.classList.add('sidebar-open');
        }
        
        // Fonction pour fermer la sidebar sur mobile
        function closeSidebar() {
            sidebar.classList.remove('active');
            document.body.classList.remove('sidebar-open');
        }
        
        // Écouter le clic sur le bouton toggle dans la navbar
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
        
        // Écouter le clic sur le bouton de fermeture dans la sidebar
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
        
        // Fermer la sidebar quand la fenêtre est redimensionnée au-dessus de 768px
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768 && sidebar.classList.contains('active')) {
                closeSidebar();
            }
        });
    });
</script>