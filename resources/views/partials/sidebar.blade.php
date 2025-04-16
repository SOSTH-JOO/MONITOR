<style>
    .sidebar {
        background-color: white;
        color: black;
        transition: width 0.3s ease;
        border-right: 1px solid #ccc;
    }

    .sidebar.collapsed {
        width: 80px !important;
    }

    .sidebar .nav-link {
        color: black;
        padding: 10px 15px;
        transition: all 0.3s ease;
        font-weight: 500;
        border-radius: 8px;
    }

    .sidebar .nav-link:hover {
        background-color: black;
        color: #FFD700;
    }

    .sidebar .submenu {
        display: none;
        padding-left: 1.5rem;
    }

    .sidebar .submenu.show {
        display: block;
    }

    .sidebar .sidebar-toggle {
        cursor: pointer;
        background: none;
        border: none;
        color: black;
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }

    .sidebar.collapsed .nav-text {
        display: none;
    }

    .sidebar.collapsed .submenu {
        display: none !important;
    }

    .sidebar.collapsed .sidebar-toggle i {
        transform: rotate(180deg);
    }

    .sidebar .sidebar-toggle {
        position: absolute;
        right: -12px;
        top: 20px;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 23px;
    }

    .arrow-icon {
        transition: transform 0.3s ease;
    }

    .arrow-icon.rotate {
        transform: rotate(90deg);
    }




    .submenu-second {
    top: 0;
    left: 100%;
    background-color: white;
    border: 1px solid #ccc;
    min-width: 180px;
    display: none;
    z-index: 999;
    padding: 0;
}

.submenu-second.show {
    display: block;
}

.submenu-second .nav-link {
    white-space: nowrap;
}

</style>

<div id="sidebar" class="sidebar vh-100 p-3 d-flex flex-column position-relative" style="width: 250px;">
    <!-- Toggle bouton flèche -->


    <!-- Titre -->
    <div class="mb-4 text-center fw-bold fs-3 nav-text">
        MONITOR
    </div>

    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ "/accueil"}}" class="nav-link">
                <i class="fas fa-home me-2"></i><span class="nav-text">Accueil</span>
            </a>
        </li>
        <!-- Menu déroulant -->


        <!-- Menu déroulant -->
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link d-flex justify-content-between align-items-center"
               onclick="toggleSubMenu('submenu2', this)">
                <span><i class="fas fa-users me-2"></i><span class="nav-text">Services</span></span>
                <i class="fas fa-chevron-right arrow-icon"></i>
            </a>
            <ul id="submenu2" class="submenu">
                <li><a href="{{ "/Xtratime"}}" class="nav-link">Xtra time</a></li>
                <li><a href="{{ "/memos"}}" class="nav-link">Memos</a></li>
                <li><a href="{{ "/Bcsheets"}}" class="nav-link">Bcsheets</a></li>
                <li><a href="{{ "/SDP"}}" class="nav-link">SDP</a></li>
                <li><a href="{{ "/Incidents"}}" class="nav-link">Incidents</a></li>

            </ul>
        </li>

        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link d-flex justify-content-between align-items-center"
               onclick="toggleSubMenu('submenu1', this)">
                <span><i class="fas fa-chart-line me-2"></i><span class="nav-text">Reconciliation</span></span>
                <i class="fas fa-chevron-right arrow-icon"></i>
            </a>
            <ul id="submenu1" class="submenu">
                <li><a href="{{ "/Evd_stats"}}" class="nav-link">EVD Stats</a></li>

                <li class="position-relative">
                    <a href="javascript:void(0)" class="nav-link d-flex justify-content-between align-items-center"
                       onclick="toggleSubMenu('submenu1-1', this)">
                        <span>EWC vs EC22</span>
                        <i class="fas fa-chevron-right arrow-icon"></i>
                    </a>
                    <!-- Sous-menu du sous-menu -->
                    <ul id="submenu1-1" class="submenu submenu-second position-absolute">
                        <li><a href="{{ "/Ewc_Ecc22_bundle"}}" class="nav-link">Bundle</a></li>
                        <li><a href="{{ "/Ewc_Ecc22_airtime"}}" class="nav-link">Airtime</a></li>
                    </ul>
                </li>
                <li><a href="#" class="nav-link">Rapports</a></li>
            </ul>
        </li>




        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link d-flex justify-content-between align-items-center"
               onclick="toggleSubMenu('submenu3', this)">
                <span><i class="fas fa-cog me-2"></i><span class="nav-text">Parametre</span></span>
                <i class="fas fa-chevron-right arrow-icon"></i>
            </a>
            <ul id="submenu3" class="submenu">
                <li><a href="{{ "/settings_security"}}" class="nav-link">Parametre Securité</a></li>
                <li><a href="{{ "/log"}}" class="nav-link">Log Surveillance</a></li>
                <li><a href="{{ "/compte"}}" class="nav-link">Gestion de compte</a></li>
            </ul>
        </li>


    </ul>
</div>

<!-- FontAwesome & JS -->
<script>


    function toggleSubMenu(id, element) {
        const submenu = document.getElementById(id);
        const arrow = element.querySelector('.arrow-icon');
        submenu.classList.toggle('show');
        arrow.classList.toggle('rotate');
    }
</script>
