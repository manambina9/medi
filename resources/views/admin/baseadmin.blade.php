<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('titre')</title>

    <!-- Custom fonts for this template-->
    <!-- <link href="{{asset('add/css/sb-admin-2.min.css')}}" rel="stylesheet">-->
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')  <!-- Inclusion du menu à gauche -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        <!-- Ajout d'une marge pour éviter que le contenu soit masqué -->

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar dans layouts.navbar -->
                @include('layouts.navbar')  <!-- Inclusion de la barre de navigation -->

                <!-- End of Topbar -->

                <!-- Sidebar Menu -->
                 <!-- Inclusion du menu secondaire si nécessaire -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('titre')</h1>
                        <!-- Optionnel: Ajout de bouton ou autres éléments ici -->
                    </div>

                    <!-- Contenu de la page -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Scripts JavaScript -->
    <!-- Ajouter des scripts ici si nécessaire -->
    <!-- Exemple : <script src="{{ asset('js/app.js') }}"></script> -->

</body>

</html>

