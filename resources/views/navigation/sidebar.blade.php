@php
    $role = 'admin'; // Simuler un rôle pour tester (changer à 'user' pour voir la différence)
@endphp

<div class="d-flex flex-column flex-shrink-0 p-3 sidebar" style="width: 280px; height: 100vh; border-radius: 15px; background: linear-gradient(to bottom, #ffffff, #e0e0e0); align-items: center; text-align: center; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
    <!-- Logo -->
    <a class="nav nav-pills" href="#"style=" margin-bottom: 30px;">
        <img src="{{ asset('images/agri-connect-logo-1.png') }}" alt="Logo" width="70px" height="70px" class="d-inline-block align-text-top rounded-circle mb-2">
    </a>
    <!-- Sidebar Navigation -->
    <ul class="nav nav-pills flex-column mb-auto w-100">
        <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link sidebar-btn">
                <i class="bi bi-house-door-fill"></i>
                Tableau de bord
            </a>
        </li>

        @if($role == 'admin')
        <li><a href="#admin-section" class="nav-link sidebar-btn"><i class="bi bi-bell-fill"></i> Journal des Alertes</a></li>
        <li><a href="{{ route('cultures.index') }}" class="nav-link sidebar-btn"><i class="bi bi-basket-fill"></i> Liste des cultures</a></li>
        <li><a href="{{ route('projects.index') }}" class="nav-link sidebar-btn"><i class="bi bi-bag-fill"></i> Liste des projets</a></li>
        <li><a href="{{ route('sites.index') }}" class="nav-link sidebar-btn"><i class="bi bi-globe-europe-africa"></i> Zones Géographiques</a></li>
        <li><a href="{{ route('users.index') }}" class="nav-link sidebar-btn"><i class="bi bi-people-fill"></i> Gestion des utilisateurs</a></li>
        @endif

        @if($role == 'user')
        <li><a href="#user-section" class="nav-link sidebar-btn"><i class="bi bi-people-fill"></i> User Section</a></li>
        <li><a href="#user-section" class="nav-link sidebar-btn"><i class="bi bi-bell-fill"></i> Journal des Alertes</a></li>
        <li><a href="#user-section" class="nav-link sidebar-btn"><i class="bi bi-basket-fill"></i> Liste des cultures</a></li>
        <li><a href="#user-section" class="nav-link sidebar-btn"><i class="bi bi-bag-fill"></i> Liste des projets</a></li>
        <li><a href="#user-section" class="nav-link sidebar-btn"><i class="bi bi-globe-europe-africa"></i> Zones Géographiques</a></li>
        @endif
    </ul>
<!-- Profil Utilisateur -->
<div class="dropdown border-top pt-3">
        <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('images/images.png') }}" alt="user-icon" class="rounded-circle me-2" width="35" height="35">
            <strong style="font-size: 14px;">{{ $role == 'admin' ? 'Admin' : 'User' }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">Profil</a></li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Déconnexion</button>
            </form>
        </ul>
    </div>
</div>

<!-- Style intégré pour la sidebar -->
<style>
    .sidebar {
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        padding-top: 10px;
    }
    
    .sidebar-btn {
        background-color: #28a745 !important;
        color: white;
        padding: 10px;
        border-radius: 15px;
        margin-bottom: 6px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: bold;
        width: 90%;
        margin-left: auto;
        margin-right: auto;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }
    .sidebar-btn i {
        margin-right: 6px;
    }
    
    .sidebar-btn:hover {
        background-color: rgb(7, 110, 15) !important;
        color: white;
    }
    
    .dropdown-menu {
        background-color: rgb(100, 121, 108);
    }
    .dropdown-menu a {
        color: white;
    }
    .dropdown-menu a:hover {
        background-color: rgb(7, 110, 15);
    }

</style>
