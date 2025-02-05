@php
    $role = 'admin'; // Simuler un rôle pour tester (changer à 'user' pour voir la différence)
@endphp

<x-app-layout>
    <div class="content">
    <div class=" container mt-5">
        <!-- Titre -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-success fw-bold">Panel de Gestion des Utilisateurs </h1>
          
        </div>

      <!-- Barre de recherche et bouton Ajouter -->
    <div class="d-flex justify-content-between mb-3 align-items-center">
        <div class="input-group w-50">
            <span class="input-group-text" id="search-icon">
                <i class="bi bi-search"></i> <!-- Icône de loupe Bootstrap -->
            </span>
            <input type="text" class="form-control" id="searchBar" placeholder="Rechercher un Utilisateur...">
        </div>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="bi bi-plus-lg"></i> Ajouter un Utilisateur
            </button>
    </div>

    <div class="table-responsive">
    <table class="table table-striped" id="culturesTable">
        <thead>
            <tr>
                <th>nom </th>
                <th>email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="culturesList">
            <tr>
                <td>imelda</td>
                <td> imelda@gmail.com</td>
                <td> 
                    <select class="form-select">
                            <option selected>superadmin</option>
                            <option>admin</option>
                            <option>utilisateur</option>
                        </select>
                </td>
                <td>
                    <i class="bi bi-check2-circle text-primary action-icon tabi" title="valider le role"></i>
                    <i class="bi bi-pencil text-success action-icon tabi" data-bs-toggle="modal" data-bs-target="#editUserModal" title="Modifier"></i>
                    <i class="bi bi-trash3 text-danger action-icon tabi" data-bs-toggle="modal" title="Supprimer"></i>
                </td>
            </tr>
            <tr>
                <td>imelda</td>
                <td> imelda@gmail.com</td>
                <td> 
                    <select class="form-select">
                            <option selected>superadmin</option>
                            <option>admin</option>
                            <option>utilisateur</option>
                        </select>
                </td>
                <td>
                    <i class="bi bi-check2-circle text-primary action-icon tabi" title="valider le role"></i>
                    <i class="bi bi-pencil text-success action-icon tabi" data-bs-toggle="modal" data-bs-target="#editSiteModal" title="Modifier"></i>
                    <i class="bi bi-trash3 text-danger action-icon tabi" data-bs-toggle="modal" title="Supprimer"></i>
                </td>
            </tr>
        </tbody>
    </table>
</div>



    <!-- Modal Ajouter -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="addUserLabel">Ajouter un utilisateur</h5>
            </div>
            <div class="modal-body">
                <form id="userForm">
                <div class="mb-3">
                        <label class="form-label">Nom d'utilisateur</label>
                        <input type="text" class="form-control" placeholder="Entrez le nom">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Entrez l'email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" placeholder="Entrez le mot de passe">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirmation du mot de passe</label>
                        <input type="password" class="form-control" placeholder="Confirmez le mot de passe">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type d'utilisateur</label>
                        <select class="form-select">
                            <option selected>User</option>
                            <option selected>Admin</option>
                            <option>superAdmin</option>
                        </select>
                    </div>
                    <button type="submit" class="block bg-green-500 text-white rounded mx-auto w-3/5 p-2 mt-3">
                        sauvegarder
                    </button>
                </form>
                <div class="modal-footer">
                    <button type="button" class="block bg-gray-600 text-white p-2 rounded" data-bs-dismiss="modal">
                        Fermer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Modal Modifier -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editUserLabel">Modifier un utilisateur</h5>
            </div>
            <div class="modal-body">
                <form id="userForm">
                <div class="mb-3">
                        <label class="form-label">Nom d'utilisateur</label>
                        <input type="text" class="form-control" placeholder="Entrez le nom">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Entrez l'email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" placeholder="Entrez le mot de passe">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirmation du mot de passe</label>
                        <input type="password" class="form-control" placeholder="Confirmez le mot de passe">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type d'utilisateur</label>
                        <select class="form-select">
                            <option selected>User</option>
                            <option selected>Admin</option>
                            <option>superAdmin</option>
                        </select>
                    </div>
                    <button type="submit" class="block bg-green-500 text-white rounded mx-auto w-3/5 p-2 mt-3">
                        sauvegarder
                    </button>
                </form>
                <div class="modal-footer">
                    <button type="button" class="block bg-gray-600 text-white p-2 rounded" data-bs-dismiss="modal">
                        Fermer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


    
    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .table thead th {
            text-align: left;
        }
        .btn-sm {
            margin-right: 5px;
        }
    .content {
    margin-left: 50px; /* Décalage pour ne pas chevaucher la sidebar */
    padding: 20px;
}

/* Amélioration globale du tableau */
.table-responsive {
    border-radius: 10px; /* Bords arrondis */
    overflow: hidden; /* Empêche les coins arrondis d’être coupés */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
}

/* Table plus fine et moderne */
.table {
    font-size: 14px; /* Réduction de la taille de la police */
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
    background: #ffffff;
}

/* En-tête du tableau stylisé */
.table thead {
    background-color: #28a745; /* Vert Bootstrap */
    color: white;
    font-weight: bold;
    text-transform: uppercase;
}

/* Style des lignes */
.table tbody tr {
    transition: all 0.3s ease-in-out;
}

/* Effet hover sur les lignes */
.table tbody tr:hover {
    background-color: rgba(40, 167, 69, 0.1); /* Légère surbrillance */
    transform: scale(1.01); /* Effet subtil de grossissement */
}

/* Affiner les bordures des cellules */
.table th,
.table td {
    padding: 12px 15px; /* Espacement interne */
    border-bottom: 1px solid #dee2e6; /* Bordure fine */
}

/* Dernière ligne sans bordure en bas */
.table tbody tr:last-child td {
    border-bottom: none;
}

/* Petits boutons plus élégants */
.btn-sm {
    padding: 5px 10px;
    font-size: 12px;
}

/* Ombre sur les boutons pour un effet 3D */
.btn {
    transition: all 0.3s ease-in-out;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
}

/* Animation au survol des boutons */
.btn:hover {
    transform: scale(1.05);
}

/* Style du champ de recherche */
.input-group {
    max-width: 500px;
    border-radius: 8px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

/* Ombre et bordure légère sur le champ de recherche */
.input-group .form-control {
    border-radius: 8px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

#culturesTable th {
        font-size: 0.875rem;
        text-transform: lowercase;
    }

.tabi{
    margin-left: 10px;
}
    </style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>


</x-app-layout>
