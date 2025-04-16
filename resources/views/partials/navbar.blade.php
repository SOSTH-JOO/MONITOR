<style>
    .custom-navbar {
        background-color: white;
        border-bottom: 1px solid #ddd;
        padding: 0.75rem 1.5rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .custom-navbar .navbar-brand {
        color: #FFD700;
        font-weight: bold;
        font-size: 1.4rem;
    }

    .custom-navbar .nav-link {
        color: #000;
        font-weight: 500;
        transition: all 0.3s ease;
        padding: 8px 15px;
        border-radius: 8px;
    }

    .custom-navbar .nav-link:hover {
        background-color: #000;
        color: #FFD700;
    }

    .custom-navbar .nav-link.text-danger:hover {
        background-color: #FFD700;
        color: #000;
    }
</style>

<nav class="navbar custom-navbar ">
    <a class="navbar-brand " href="#">MTN - MONITOR </a>

    <div class="ms-auto d-flex align-items-center">
        <ul class="navbar-nav flex-row">
            <li class="nav-item me-3">
                <a class="nav-link" href="{{ route('Mon_profil') }}"><i class="fas fa-user-circle me-1"></i>Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt me-1"></i>Déconnexion</a>
            </li>
        </ul>
    </div>
</nav>

<!-- FontAwesome (si pas déjà inclus) -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
