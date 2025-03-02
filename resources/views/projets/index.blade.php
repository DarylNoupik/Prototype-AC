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

     <!-- Messages de session -->
     @if (session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif


    <!-- Informations du projet améliorées -->
     @foreach ( $projects as $project)
         
    
    <div class="project-info-card">
        <h3>🌱 {{ $project->name }}</h3>
        <div class="info-grid">
            <div class="project-info"><i class="bi bi-person-circle"></i> <strong>Créé par :</strong> {{ $project->user->name }}</div>
            <div class="project-info"><i class="bi bi-calendar"></i> <strong>Créé le :</strong> {{ $project->created_at->format('d/m/Y') }}</div>
            <div class="project-info"><i class="bi bi-geo-alt"></i> <strong>Pays :</strong> {{ $project->site->pays }}</div>
            <div class="project-info"><i class="bi bi-map"></i> <strong>Région :</strong> {{ $project->site->region }}</div>
            <div class="project-info"><i class="bi bi-building"></i> <strong>Ville :</strong> {{ $project->site->ville }}</div>
            <div class="project-info"><i class="bi bi-tree"></i> <strong>Site géographique :</strong> {{ $project->site->name }}</div>
            <div class="project-info"><i class="bi bi-grid"></i> <strong>Nombre de blocs :</strong> 3</div>
        </div>
        <!-- Liste des blocs sous forme de cartes -->
    <div class="row mt-4">
             @foreach ($project->cultures as $culture)
                        <div class="col-md-4 mb-4">
                            <div class="project-card">
                                <div class="card-header">Bloc - {{ $culture->name }}</div>
                                <div class="card-body">
                                    <p>🌡️ <b>Température ambiante :</b> {{ rand(20, 30) }}°C</p>
                                    <p>💧 <b>Humidité courante :</b> {{ rand(50, 70) }}%</p>
                                    <p>☀️ <b>Luminosité courante :</b> {{ rand(40, 70) }} Lux</p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-green btn-custom" data-bs-toggle="modal" data-bs-target="#modifBlocModal-{{$culture->id}}">
                                        <i class="bi bi-pencil-square"></i> Modifier
                                    </button>
                                    <button class="btn btn-red btn-custom">
                                        <i class="bi bi-trash"></i> Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal modifier un bloc -->
                    <div class="modal fade" id="modifBlocModal-{{$culture->id}}"  tabindex="-1" aria-labelledby="modifBlocModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Header du modal -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modifBlocModalLabel">Modification du bloc <strong>{{ $culture->name }}</strong></h5>
                                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="bi bi-x-circle"></i>
                                    </button>
                                </div>

                                <!-- Body du modal -->
                                <div class="modal-body">
                                    <form>
                                    <div class="mb-3">
                                        <label for="NomBloc-{{ $culture->id }}" class="form-label">Nom du bloc</label>
                                        <input type="text" class="form-control" name="Name" id="NomBloc-{{ $culture->id }}" value="{{ $culture->name }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="CultureBloc-{{ $culture->id }}" class="form-label">Culture présente dans ce bloc</label>
                                        <select class="form-select" name="culture_Id" id="CultureBloc-{{ $culture->id }}" required>
                                            @foreach ($cultures as $AvailableCulture)
                                                <option value="{{ $AvailableCulture->id }}" {{ $AvailableCulture->id == $culture->id ? 'selected' : '' }}>
                                                    {{ $AvailableCulture->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="ProjetBloc-{{ $culture->id }}" class="form-label">Projet contenant ce bloc</label>
                                        <select class="form-select" name="Project_Id" id="ProjetBloc-{{ $culture->id }}" required>
                                            @foreach ($projects as $AvailableProject)
                                                <option value="{{ $AvailableProject->id }}" {{ $AvailableProject->id == $project->id ? 'selected' : '' }}>
                                                    {{ $AvailableProject->name }}
                                                </option>
                                            @endforeach
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
            @endforeach
    </div>

    </div>

    

    <div class="d-flex justify-content-center gap-3 mt-4">
        <button class="btn btn-green btn-custom"data-bs-toggle="modal" data-bs-target="#AjoutBlocModal"><i class="bi bi-plus-lg"></i> Ajouter un bloc</button>
        <button class="btn btn-green btn-custom" data-bs-toggle="modal" data-bs-target="#modifProjetModal"><i class="bi bi-pencil-square"></i> Modifier ce Projet</button>
        <button class="btn btn-red btn-custom"><i class="bi bi-trash"></i> Supprimer ce Projet</button>
    </div>
</div>
</div>
@endforeach

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
                <form method="POST" action="{{ route('projects.store') }}">
                    @csrf  <!-- Sécurité Laravel -->

                    <div class="mb-3">
                        <label for="nomProjet" class="form-label">Nom du projet</label>
                        <input type="text" name="name" class="form-control" id="nomProjet" placeholder="Entrez le nom du projet" required>
                    </div>

                    <div class="mb-3">
                        <label for="cultureProjet" class="form-label">Sélectionnez une culture 
                            <small class="text-muted">(qui sera présente dans le premier bloc de ce projet)</small>
                        </label>
                        <select name="culture_id" class="form-select" id="cultureProjet" required>
                            <option value="" selected disabled>Veuillez choisir...</option>
                            @foreach ($cultures as $culture)
                                <option value="{{ $culture->id }}">{{ $culture->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="siteGeographique" class="form-label">Sélectionnez un site géographique</label>
                        <select name="site_id" class="form-select" id="siteGeographique">
                            <option value="" selected disabled>Veuillez choisir...</option>
                            @foreach ($sites as $site)
                                <option value="{{ $site->id }}">{{ $site->name }}</option>
                            @endforeach
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

<!-- Modal ajouter un bloc -->

<div class="modal fade" id="AjoutBlocModal" tabindex="-1" aria-labelledby="AjoutBlocModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header du modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="AjoutBlocModalLabel">Ajout d'un bloc</h5>
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

                     <!-- Temperature courante du bloc -->
                     <div class="mb-3">
                            <label for="temperature" class="form-label"> Temperature courante du bloc </label>
                            <input id="temperature"
                                   class="form-control rounded w-full focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" step="0.01" required autofocus/>
                        </div>
                        <!-- Humidite  courante du bloc -->
                        <div class="mb-3">
                            <label for="humidite" class="form-label"> Humidite courante du bloc </label>
                            <input id="humidite" 
                                   class="form-control rounded w-full focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" step="0.01" required autofocus/>
                        </div>

                        <!-- Luminosite courante du bloc -->
                        <div class="mb-3">
                            <label for="luminosite" class="form-label"> Luminosite courante du bloc </label>
                            <input id="luminosite"
                                   class="form-control rounded w-full focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                   type="number" step="0.01" required autofocus/>
                        </div>
                    <div class="mb-3">
                        <label for="cultureBloc" class="form-label">Culture présente dans ce bloc</label>
                        <select class="form-select" id="cultureBloc">
                            <option selected>riz</option>
                            <option>maïs</option>
                            <option>blé</option>
                        </select>
                    </div>

                    <!-- Bouton ajout -->
                    <button type="submit" class="btn btn-green">ajouter ce bloc</button>
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
