@php
    $role = 'user'; // Simuler un rôle pour tester (changer à 'user' pour voir la différence)
@endphp

<x-app-layout>
    <div class="content">
    <div class=" container mt-5">
        <!-- Titre -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-success fw-bold">Gestion des Cultures</h1>
          
        </div>

      <!-- Barre de recherche et bouton Ajouter -->
    <div class="d-flex justify-content-between mb-3 align-items-center">
        <div class="input-group w-50">
            <span class="input-group-text" id="search-icon">
                <i class="bi bi-search"></i> <!-- Icône de loupe Bootstrap -->
            </span>
            <input type="text" class="form-control" id="searchBar" placeholder="Rechercher une culture">
        </div>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCultureModal">
                <i class="bi bi-plus-lg"></i> Ajouter une Culture
            </button>
    </div>

    <div class="table-responsive">
    <table class="table table-striped" id="culturesTable">
        <thead>
            <tr>
                <th>Nom de la Culture</th>
                <th>Température minimale supportée</th>
                <th>Température maximale supportée</th>
                <th>Luminosité minimale supportée</th>
                <th>Luminosité maximale supportée</th>
                <th>Humidité minimale supportée</th>
                <th>Humidité maximale supportée</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="culturesList">
            <tr>
                <td>Coton</td>
                <td> 10 °C</td>
                <td> 10 °C</td>
                <td> 10 Lux</td>
                <td> 10 Lux</td>
                <td> 10 g/m</td>
                <td> 10 g/m</td>
                <td>
                @if($role == 'user')
                    <i class="bi bi-eye text-primary action-icon tabi" data-bs-toggle="modal" data-bs-target="#viewCultureModal" title="Voir"></i>
                @endif
                @if($role == 'admin')
                    <i class="bi bi-eye text-primary action-icon tabi" data-bs-toggle="modal" data-bs-target="#viewCultureModal" title="Voir"></i>
                    <i class="bi bi-pencil text-success action-icon tabi" data-bs-toggle="modal" data-bs-target="#editCultureModal" title="Modifier"></i>
                    <i class="bi bi-trash3 text-danger action-icon tabi" data-bs-toggle="modal" title="Supprimer"></i>
                @endif
                </td>
            </tr>
            <tr>
                <td>Maïs</td>
                <td> 10 °C</td>
                <td> 10 °C</td>
                <td> 10 Lux</td>
                <td> 10 Lux</td>
                <td> 10 g/m</td>
                <td> 10 g/m</td>
                <td>
                @if($role == 'user')
                    <i class="bi bi-eye text-primary action-icon tabi" data-bs-toggle="modal" data-bs-target="#viewCultureModal" title="Voir"></i>
                @endif
                @if($role == 'admin')
                    <i class="bi bi-eye text-primary action-icon tabi" data-bs-toggle="modal" data-bs-target="#viewCultureModal" title="Voir"></i>
                    <i class="bi bi-pencil text-success action-icon tabi" data-bs-toggle="modal" data-bs-target="#editCultureModal" title="Modifier"></i>
                    <i class="bi bi-trash3 text-danger action-icon tabi" data-bs-toggle="modal" title="Supprimer"></i>
                @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>


    <!-- Modal Ajouter -->
<div class="modal fade" id="addCultureModal" tabindex="-1" aria-labelledby="addCultureModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="addCultureModalLabel">Ajouter une Culture</h5>
            </div>
            <div class="modal-body">
                <form id="cultureForm">
                    <div class="row">
                        <!-- Nom de la culture -->
                        <div class="col-md-6 mt-2">
                            <label for="name" class="text-sm">Nom de la culture</label>
                            <input id="name"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="text" name="name" required autofocus/>
                        </div>
                        
                        <!-- Température minimale supportée -->
                        <div class="col-md-6 mt-2">
                            <label for="Temp_min" class="text-sm">Température minimale supportée</label>
                            <input id="Temp_min"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" name="Temp_min" step="0.01" required/>
                        </div>
                        
                        <!-- Température maximale supportée -->
                        <div class="col-md-6 mt-2">
                            <label for="Temp_max" class="text-sm">Température maximale supportée</label>
                            <input id="Temp_max"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" name="Temp_max" step="0.01" required/>
                        </div>
                        
                        <!-- Luminosité minimale supportée -->
                        <div class="col-md-6 mt-2">
                            <label for="TCO2_min" class="text-sm">Luminosité minimale supportée</label>
                            <input id="TCO2_min"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" name="TCO2_min" step="0.01" required/>
                        </div>
                        
                        <!-- Luminosité maximale supportée -->
                        <div class="col-md-6 mt-2">
                            <label for="TCO2_max" class="text-sm">Luminosité maximale supportée</label>
                            <input id="TCO2_max"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" name="TCO2_max" step="0.01" required/>
                        </div>
                        
                        <!-- Humidité minimale supportée -->
                        <div class="col-md-6 mt-2">
                            <label for="vsH2O_min" class="text-sm">Humidité minimale supportée</label>
                            <input id="vsH2O_min"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" name="vsH2O_min" step="0.01" required/>
                        </div>
                        
                        <!-- Humidité maximale supportée -->
                        <div class="col-md-6 mt-2">
                            <label for="vsH2O_max" class="text-sm">Humidité maximale supportée</label>
                            <input id="vsH2O_max"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" name="vsH2O_max" step="0.01" required/>
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
<div class="modal fade" id="editCultureModal" tabindex="-1" aria-labelledby="editCultureModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editCultureModalLabel">modifier une Culture</h5>
            </div>
            <div class="modal-body">
                <form id="cultureForm">
                    <div class="row">
                        <!-- Nom de la culture -->
                        <div class="col-md-6 mt-2">
                            <label for="name" class="text-sm">Nom de la culture</label>
                            <input id="name"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="text" name="name" required autofocus/>
                        </div>
                        
                        <!-- Température minimale supportée -->
                        <div class="col-md-6 mt-2">
                            <label for="Temp_min" class="text-sm">Température minimale supportée</label>
                            <input id="Temp_min"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" name="Temp_min" step="0.01" required/>
                        </div>
                        
                        <!-- Température maximale supportée -->
                        <div class="col-md-6 mt-2">
                            <label for="Temp_max" class="text-sm">Température maximale supportée</label>
                            <input id="Temp_max"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" name="Temp_max" step="0.01" required/>
                        </div>
                        
                        <!-- Luminosité minimale supportée -->
                        <div class="col-md-6 mt-2">
                            <label for="TCO2_min" class="text-sm">Luminosité minimale supportée</label>
                            <input id="TCO2_min"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" name="TCO2_min" step="0.01" required/>
                        </div>
                        
                        <!-- Luminosité maximale supportée -->
                        <div class="col-md-6 mt-2">
                            <label for="TCO2_max" class="text-sm">Luminosité maximale supportée</label>
                            <input id="TCO2_max"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" name="TCO2_max" step="0.01" required/>
                        </div>
                        
                        <!-- Humidité minimale supportée -->
                        <div class="col-md-6 mt-2">
                            <label for="vsH2O_min" class="text-sm">Humidité minimale supportée</label>
                            <input id="vsH2O_min"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" name="vsH2O_min" step="0.01" required/>
                        </div>
                        
                        <!-- Humidité maximale supportée -->
                        <div class="col-md-6 mt-2">
                            <label for="vsH2O_max" class="text-sm">Humidité maximale supportée</label>
                            <input id="vsH2O_max"
                                   class="text-sm block border-green-200 rounded mt-1 w-100 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" name="vsH2O_max" step="0.01" required/>
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


    <!-- Modal Voir Culture -->
    <div class="modal fade" id="viewCultureModal" tabindex="-1" aria-labelledby="viewCultureModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="viewCultureModalLabel">Détails de la Culture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nom de la culture:</strong> Coton</p>
                    <p><strong>Température minimale supportée:</strong> 10 °C</p>
                    <p><strong>Température maximale supportée:</strong> 10 °C</p>
                    <p><strong>Luminosité minimale suppoetée:</strong> 10 Lux</p>
                    <p><strong>Luminosité maximale suppoetée:</strong> 10 Lux</p>
                    <p><strong>Humidité minimale suppoetée:</strong> 10 g/m</p>
                    <p><strong>Humidité maximale suppoetée:</strong> 10 g/m</p>
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
