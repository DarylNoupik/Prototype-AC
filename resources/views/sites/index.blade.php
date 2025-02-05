@php
    $role = 'admin'; // Simuler un rôle pour tester (changer à 'user' pour voir la différence)
@endphp

<x-app-layout>
    <div class="content">
    <div class=" container mt-5">
        <!-- Titre -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-success fw-bold">Gestion des Sites Géeographiques</h1>
          
        </div>

      <!-- Barre de recherche et bouton Ajouter -->
    <div class="d-flex justify-content-between mb-3 align-items-center">
        <div class="input-group w-50">
            <span class="input-group-text" id="search-icon">
                <i class="bi bi-search"></i> <!-- Icône de loupe Bootstrap -->
            </span>
            <input type="text" class="form-control" id="searchBar" placeholder="Rechercher un site">
        </div>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSiteModal">
                <i class="bi bi-plus-lg"></i> Ajouter un site
            </button>
    </div>

    <div class="table-responsive">
    <table class="table table-striped" id="culturesTable">
        <thead>
            <tr>
                <th>nom</th>
                <th>pays</th>
                <th>région</th>
                <th>ville</th>
                <th>temperature moyenne</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="culturesList">
            <tr>
                <td>site 1</td>
                <td> cameroun</td>
                <td> littorale</td>
                <td> Douala</td>
                <td> 10 °C</td>
                <td>
                @if($role == 'user')
                    <i class="bi bi-eye text-primary action-icon tabi" data-bs-toggle="modal" data-bs-target="#viewSiteModal" title="Voir"></i>
                @endif
                @if($role == 'admin')
                    <i class="bi bi-eye text-primary action-icon tabi" data-bs-toggle="modal" data-bs-target="#viewSiteModal" title="Voir"></i>
                    <i class="bi bi-pencil text-success action-icon tabi" data-bs-toggle="modal" data-bs-target="#editSiteModal" title="Modifier"></i>
                    <i class="bi bi-trash3 text-danger action-icon tabi" data-bs-toggle="modal" title="Supprimer"></i>
                @endif
                </td>
            </tr>
            <tr>
            <td>site 1</td>
                <td> cameroun</td>
                <td> littorale</td>
                <td> Douala</td>
                <td> 10 °C</td>
                <td>
                @if($role == 'user')
                    <i class="bi bi-eye text-primary action-icon tabi" data-bs-toggle="modal" data-bs-target="#viewSiteModal" title="Voir"></i>
                @endif
                @if($role == 'admin')
                    <i class="bi bi-eye text-primary action-icon tabi" data-bs-toggle="modal" data-bs-target="#viewSiteModal" title="Voir"></i>
                    <i class="bi bi-pencil text-success action-icon tabi" data-bs-toggle="modal" data-bs-target="#editSiteModal" title="Modifier"></i>
                    <i class="bi bi-trash3 text-danger action-icon tabi" data-bs-toggle="modal" title="Supprimer"></i>
                @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>


    <!-- Modal Ajouter -->
<div class="modal fade" id="addSiteModal" tabindex="-1" aria-labelledby="addSiteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="addSiteModalLabel">Ajouter un site</h5>
            </div>
            <div class="modal-body">
                <form id="siteForm">
                    <div class="row">
                        <!-- Nom de la culture -->
                        <div class="col-md-6 mt-2">
                            <label for="name" class="text-sm">Nom du site</label>
                            <input id="name"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="text" name="name" required autofocus/>
                        </div>
                        
                        <!-- pays -->
                
                         <div class="col-md-6 mt-2">
                            <label for="pays" class="text-sm">pays</label>
                            <input id="pays"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="text" name="pays" required autofocus/>
                        </div>
                        
                         <!-- region -->
                         <div class="col-md-6 mt-2">
                            <label for="region" class="text-sm">Région</label>
                            <input id="region"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="text" name="region" required autofocus/>
                        </div>

                         <!-- ville -->
                         <div class="col-md-6 mt-2">
                            <label for="ville" class="text-sm">Ville</label>
                            <input id="ville"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="text" name="ville" required autofocus/>
                        </div>

                        <!-- Température moyenne supportée -->
                        <div class="col-md-6 mt-2">
                            <label for="Temp_moy" class="text-sm">Température maximale supportée</label>
                            <input id="Temp_moy"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" name="Temp_moy" step="0.01" required/>
                        </div>
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
<div class="modal fade" id="editSiteModal" tabindex="-1" aria-labelledby="editSiteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editSiteModalLabel">Modifier un site</h5>
            </div>
            <div class="modal-body">
                <form id="siteForm">
                    <div class="row">
                        <!-- Nom de la culture -->
                        <div class="col-md-6 mt-2">
                            <label for="name" class="text-sm">Nom du site</label>
                            <input id="name"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="text" name="name" required autofocus/>
                        </div>
                        
                        <!-- pays -->
                
                         <div class="col-md-6 mt-2">
                            <label for="pays" class="text-sm">pays</label>
                            <input id="pays"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="text" name="pays" required autofocus/>
                        </div>
                        
                         <!-- region -->
                         <div class="col-md-6 mt-2">
                            <label for="region" class="text-sm">Région</label>
                            <input id="region"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="text" name="region" required autofocus/>
                        </div>

                         <!-- ville -->
                         <div class="col-md-6 mt-2">
                            <label for="ville" class="text-sm">Ville</label>
                            <input id="ville"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="text" name="ville" required autofocus/>
                        </div>

                        <!-- Température moyenne supportée -->
                        <div class="col-md-6 mt-2">
                            <label for="Temp_moy" class="text-sm">Température maximale supportée</label>
                            <input id="Temp_moy"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" name="Temp_moy" step="0.01" required/>
                        </div>
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

    <!-- Modal Voir site-->
    <div class="modal fade" id="viewSiteModal" tabindex="-1" aria-labelledby="viewSiteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="viewSiteModalLabel">Détails du Site</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nom du site:</strong> site 1</p>
                    <p><strong>Pays:</strong> Cameroun</p>
                    <p><strong>Region:</strong> Littoral</p>
                    <p><strong>Ville:</strong> Douala</p>
                    <p><strong>Temperature Moyenne:</strong> 10 °C</p>
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
