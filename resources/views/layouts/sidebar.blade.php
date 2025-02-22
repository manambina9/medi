<div class="sidebar">
    <h2>Menu</h2>
    <ul>
        <li><a href="{{ route('admin.users.index') }}">Gestion des utilisateurs</a></li>
        <li><a href="#">Gestion des produits</a></li>
        <li><a href="#">Paramètres</a></li>
        <li><a href="#">Rapports</a></li>
    </ul>
</div>

<!-- Main content area, to avoid overlap with the sidebar -->


<style>
    /* Sidebar (non fixe) */
    .sidebar {
        width: 250px;
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 8px;
        position: absolute;  /* Position absolue pour ne pas interférer avec la navbar */
        top: 60px;  /* Place la sidebar en dessous de la navbar */
        left: 0;
        height: calc(100% - 60px);  /* Pour que la sidebar ne dépasse pas la page */
        z-index: 100;
        overflow-y: auto;
    }

    .sidebar h2 {
        font-size: 18px;
        margin-bottom: 20px;
        color: #007bff;
        font-weight: bold;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }

    .sidebar ul li {
        margin: 15px 0;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: #333;
        font-size: 16px;
        padding: 12px 15px;
        display: block;
        border-radius: 4px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .sidebar ul li a:hover {
        background-color: #007bff;
        color: #fff;
    }

    /* Pour le contenu de la page afin qu'il ne soit pas masqué par la sidebar */
    .content-wrapper {
        margin-left: 270px;  /* Décale le contenu à droite de la sidebar */
        padding: 20px;
        padding-top: 60px;  /* Assurez-vous que le contenu ne soit pas caché sous la navbar */
    }

    /* Topbar si elle est présente (assurez-vous que la topbar est correctement incluse dans le layout) */
    .navbar {
        background-color: #007bff;
        color: white;
        padding: 15px;
        text-align: center;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 200;
    }
</style>


