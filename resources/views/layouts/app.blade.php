<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Tableau de Bord')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.7.2-web/css/all.min.css') }}">

    <!-- Ton CSS personnalisé -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body {
            margin: 0;
        }
        .sidebar-fixed {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background-color: #1E0F1C;
            color: whitesmoke;
            z-index: 1000;
        }

        .main-content {
            margin-left: 250px;
            width: calc(100% - 250px);
        }

        .navbar-fixed {
            position: sticky;
            top: 0;
            z-index: 999;
            background-color: #1E0F1C;
            color: whitesmoke;
        }

        .content-wrapper {
            padding: 1rem;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar-fixed">
        @include('partials.sidebar')
    </div>

    <!-- Main Content -->
    <div class="main-content d-flex flex-column">
        <!-- Navbar -->
        <div class="navbar-fixed">
            @include('partials.navbar')
        </div>

        <!-- Contenu -->
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    @yield('scripts')

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
