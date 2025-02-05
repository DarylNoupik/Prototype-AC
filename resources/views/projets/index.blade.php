@php
    $role = 'user'; // Simuler un rôle pour tester (changer à 'user' pour voir la différence)
@endphp

<x-app-layout>
<div class="content">
<div class="container mt-4">
    <!-- Barre de recherche et ajout -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="search-bar">
            <i class="bi bi-search text-muted"></i>
            <input type="text" class="form-control" placeholder="Rechercher un projet...">
        </div>
        <button class="btn btn-green btn-custom" data-bs-toggle="modal" data-bs-target="#ajoutProjetModal">
            <i class="bi bi-plus-lg"></i> Ajouter un projet
        </button>
    </div>

    <!-- Informations du projet améliorées -->
    <div class="project-info-card">
        <h3>🌱 Culture de Riz</h3>
        <div class="info-grid">
            <div class="project-info"><i class="bi bi-person-circle"></i> <strong>Créé par :</strong> KMI</div>
            <div class="project-info"><i class="bi bi-calendar"></i> <strong>Créé le :</strong> 04-02-2025</div>
            <div class="project-info"><i class="bi bi-geo-alt"></i> <strong>Pays :</strong> Cameroun</div>
            <div class="project-info"><i class="bi bi-map"></i> <strong>Région :</strong> Littoral</div>
            <div class="project-info"><i class="bi bi-building"></i> <strong>Ville :</strong> Douala</div>
            <div class="project-info"><i class="bi bi-tree"></i> <strong>Site géographique :</strong> Beedi</div>
            <div class="project-info"><i class="bi bi-grid"></i> <strong>Nombre de blocs :</strong> 3</div>
        </div>
        <!-- Liste des blocs sous forme de cartes -->
    <div class="row mt-4">
        <!-- Bloc 1 -->
        <div class="col-md-4 mb-4">
            <div class="project-card">
                <div class="card-header">Bloc 1 - Riz</div>
                <div class="card-body">
                    <p>🌡️ <b>Température ambiante :</b> 25°C</p>
                    <p>💧 <b>Humidité courante :</b> 60%</p>
                    <p>☀️ <b>Luminosité courante :</b> 50Lux</p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-green btn-custom" data-bs-toggle="modal" data-bs-target="#modifBlocModal"><i class="bi bi-pencil-square"></i> Modifier</button>
                    <button class="btn btn-red btn-custom"><i class="bi bi-trash"></i> Supprimer</button>
                </div>
            </div>
        </div>

        <!-- Bloc 2 -->
        <div class="col-md-4 mb-4">
            <div class="project-card">
                <div class="card-header">Bloc 2 - Maïs</div>
                <div class="card-body">
                    <p>🌡️ <b>Température ambiante :</b> 22°C</p>
                    <p>💧 <b>Humidité courante :</b> 55%</p>
                    <p>☀️ <b>Luminosité courante :</b> 60Lux</p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-green btn-custom" data-bs-toggle="modal" data-bs-target="#modifBlocModal"><i class="bi bi-pencil-square"></i> Modifier</button>
                    <button class="btn btn-red btn-custom" ><i class="bi bi-trash"></i> Supprimer</button>
                </div>
            </div>
        </div>


                <!-- Bloc 2 -->
                <div class="col-md-4 mb-4">
            <div class="project-card">
                <div class="card-header">Bloc 2 - Maïs</div>
                <div class="card-body">
                    <p>🌡️ <b>Température ambiante :</b> 22°C</p>
                    <p>💧 <b>Humidité courante :</b> 55%</p>
                    <p>☀️ <b>Luminosité courante :</b> 60Lux</p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-green btn-custom"data-bs-toggle="modal" data-bs-target="#modifBlocModal"><i class="bi bi-pencil-square"></i> Modifier</button>
                    <button class="btn btn-red btn-custom"><i class="bi bi-trash"></i> Supprimer</button>
                </div>
            </div>
        </div>
    </div>

    </div>

    

    <div class="d-flex justify-content-center gap-3 mt-4">
        <button class="btn btn-green btn-custom"><i class="bi bi-plus-lg"></i> Ajouter un bloc</button>
        <button class="btn btn-green btn-custom" data-bs-toggle="modal" data-bs-target="#modifProjetModal"><i class="bi bi-pencil-square"></i> Modifier ce Projet</button>
        <button class="btn btn-red btn-custom"><i class="bi bi-trash"></i> Supprimer ce Projet</button>
    </div>
</div>
</div>


<!-- Modal pour ajouter un projet-->

<div class="modal fade" id="ajoutProjetModal" tabindex="-1" aria-labelledby="ajoutProjetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header du modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutProjetModalLabel">Formulaire d'ajout d'un projet</h5>
                <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle"></i>
                </button>
            </div>

            <!-- Body du modal -->
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nomProjet" class="form-label">Nom du projet</label>
                        <input type="text" class="form-control" id="nomProjet" placeholder="Entrez le nom du projet">
                    </div>

                    <div class="mb-3">
                        <label for="cultureProjet" class="form-label">Sélectionnez une culture 
                            <small class="text-muted">(qui sera présente dans le premier bloc de ce projet)</small>
                        </label>
                        <select class="form-select" id="cultureProjet">
                            <option selected>riz</option>
                            <option>maïs</option>
                            <option>blé</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="siteGeographique" class="form-label">Sélectionnez un site géographique</label>
                        <select class="form-select" id="siteGeographique">
                            <option selected>Beedi</option>
                            <option>Yaoundé</option>
                            <option>Douala</option>
                        </select>
                    </div>

                    <!-- Bouton de soumission -->
                    <button type="submit" class="btn btn-modal-green">Créer ce projet</button>
                </form>
            </div>

            <!-- Footer du modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal modifier un bloc -->
<div class="modal fade" id="modifBlocModal" tabindex="-1" aria-labelledby="modifBlocModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header du modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="modifBlocModalLabel">Modification du bloc <strong>culture de riz Bloc 1</strong></h5>
                <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle"></i>
                </button>
            </div>

            <!-- Body du modal -->
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nomBloc" class="form-label">Nom du bloc</label>
                        <input type="text" class="form-control" id="nomBloc" value="culture de riz Bloc 1">
                    </div>

                    <div class="mb-3">
                        <label for="cultureBloc" class="form-label">Culture présente dans ce bloc</label>
                        <select class="form-select" id="cultureBloc">
                            <option selected>riz</option>
                            <option>maïs</option>
                            <option>blé</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="projetBloc" class="form-label">Projet contenant ce bloc</label>
                        <select class="form-select" id="projetBloc">
                            <option selected>culture de riz</option>
                            <option>culture de maïs</option>
                            <option>culture de blé</option>
                        </select>
                    </div>

                    <!-- Bouton de modification -->
                    <button type="submit" class="btn btn-modal-green">Modifier ce bloc</button>
                </form>
            </div>

            <!-- Footer du modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal modifier un projet -->

<div class="modal fade" id="modifProjetModal" tabindex="-1" aria-labelledby="modifProjetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header du modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="modifProjetModalLabel">Modification(s) du projet <strong>culture de riz</strong></h5>
                <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle"></i>
                </button>
            </div>

            <!-- Body du modal -->
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nomProjet" class="form-label">Nom du projet</label>
                        <input type="text" class="form-control" id="nomProjet" value="culture de riz">
                    </div>

                    <div class="mb-3">
                        <label for="siteGeo" class="form-label">Sélectionnez un site géographique</label>
                        <select class="form-select" id="siteGeo">
                            <option selected>Beedi</option>
                            <option>Douala</option>
                            <option>Yaoundé</option>
                        </select>
                    </div>

                    <!-- Bouton de modification -->
                    <button type="submit" class="btn btn-modal-green">Modifier ce projet</button>
                </form>
            </div>

            <!-- Footer du modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<style>
       body {
            background-color: #f4f5f7;
            font-family: 'Arial', sans-serif;
        }

        /* Barre de recherche */
        .search-bar {
            background: white;
            border-radius: 12px;
            padding: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 5px;
            width: 50%;
        }
        .search-bar input {
            border: none;
            outline: none;
            flex: 1;
        }

        /* Carte projet améliorée */
        .project-info-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }
        .project-info-card h3 {
            font-weight: bold;
            color: #198754;
            text-align: center;
            margin-bottom: 15px;
        }

        /* Icônes et infos du projet */
        .project-info {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .project-info i {
            color: #28a745;
            font-size: 1.2rem;
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        /* Cartes des blocs */
        .project-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        /* En-tête de la carte */
        .card-header {
            background: #28a745;
            color: white;
            padding: 15px;
            font-weight: bold;
            text-align: center;
        }

        /* Contenu de la carte */
        .card-body {
            padding: 20px;
            text-align: justify;
        }

        /* Footer de la carte */
        .card-footer {
            background: #f8f9fa;
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }

        /* Boutons modernisés */
        .btn-custom {
            font-size: 0.9rem;
            font-weight: bold;
            border-radius: 8px;
            border: 2px solid;
            padding: 8px 15px;
            transition: all 0.3s ease;
        }
        .btn-green {
            color: #28a745;
            border-color: #28a745;
            background: transparent;
        }
        .btn-green:hover {
            background: #28a745;
            color: white;
        }
        .btn-red {
            color: #dc3545;
            border-color: #dc3545;
            background: transparent;
        }
        .btn-red:hover {
            background: #dc3545;
            color: white;
        }

        /* Personnalisation du modal */
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            border-bottom: none;
            padding: 15px 20px;
        }

        .modal-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .close-btn {
            background: transparent;
            border: none;
            font-size: 1.5rem;
            color: #28a745;
        }
        .close-btn:hover {
            color: #28a745;
        }

        .modal-body {
            padding: 20px;
        }

        .form-label {
            font-size: 0.9rem;
            font-weight: 600;
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #ced4da;
        }

        /* Bouton principal */
        .btn-modal-green {
            background: #28a745;
            color: white;
            font-weight: bold;
            padding: 10px;
            width: 100%;
            border-radius: 8px;
            transition: all 0.3s ease;
            border: none;
        }
        .btn-modal-green:hover {
            background: #28a745;
        }

        /* Bouton de fermeture */
        .btn-close-modal {
            background: #6c757d;
            color: white;
            border-radius: 8px;
            padding: 8px 15px;
            font-weight: bold;
            transition: all 0.3s ease;
            border: none;
        }
        .btn-close-modal:hover {
            background: #545b62;
        }

        .content {
    margin-left: 50px; /* Décalage pour ne pas chevaucher la sidebar */
    padding: 20px;
}
    </style>


</x-app-layout>
