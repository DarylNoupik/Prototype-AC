@php
    $role = 'user'; // Simuler un rôle pour tester
@endphp

<x-app-layout>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
            :root { --sidebar-w: 260px; }
.content{
  margin-left: var(--sidebar-w);
  width: calc(100% - var(--sidebar-w));
  padding: 20px;
  position: relative;
  z-index: 1;               
  overflow-x: hidden;      
}
.sidebar{
  position: fixed; 
  left: 0; top: 0; bottom: 0; width: var(--sidebar-w);
  z-index: 2000;             
}
.project-info-card, .chart-container {
  max-width: 100%;
  overflow: hidden;           
}
canvas{
  display: block;             
  max-width: 100%;            
  height: auto;
}



         </style>   
        <style>
        body {
            background-color: #f4f5f7;
            font-family: 'Arial', sans-serif;
        }
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
        .project-info-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .project-info-card h3 {
            font-weight: bold;
            color: #198754;
            text-align: center;
            margin-bottom: 15px;
        }
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
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }
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
        .card-header {
            background: #28a745;
            color: white;
            padding: 15px;
            font-weight: bold;
            text-align: center;
        }
        .card-body {
            padding: 20px;
            text-align: justify;
        }
        .card-footer {
            background: #f8f9fa;
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }
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
        .btn-modal-green {
            background: #28a745;
            color: white;
            font-weight: bold;
            padding: 10px;
            width: 100%;
            border-radius: 8px;
            border: none;
        }
        .btn-close-modal {
            background: #6c757d;
            color: white;
            border-radius: 8px;
            padding: 8px 15px;
            font-weight: bold;
            border: none;
        }
        .content {
            margin-left: 50px;
            padding: 20px;
        }
    </style>
    </head>


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

            <!-- Informations du projet -->
            @foreach ($projects as $project)
                <div class="project-info-card">
                    <h3>🌱 {{ $project->name }}</h3>
                    <div class="info-grid">
                        <div class="project-info"><i class="bi bi-person-circle"></i> <strong>Créé par :</strong> {{ $project->user->name }}</div>
                        <div class="project-info"><i class="bi bi-calendar"></i> <strong>Créé le :</strong> {{ $project->created_at->format('d/m/Y') }}</div>
                        <div class="project-info"><i class="bi bi-geo-alt"></i> <strong>Pays :</strong> {{ $project->site->pays }}</div>
                        <div class="project-info"><i class="bi bi-map"></i> <strong>Région :</strong> {{ $project->site->region }}</div>
                        <div class="project-info"><i class="bi bi-building"></i> <strong>Ville :</strong> {{ $project->site->ville }}</div>
                        <div class="project-info"><i class="bi bi-tree"></i> <strong>Site géographique :</strong> {{ $project->site->name }}</div>
                        <div class="project-info"><i class="bi bi-grid"></i> <strong>Nombre de blocs :</strong> {{ $project->cultures->count() }}</div>
                    </div>

                    <!-- Graphique pour les données historiques du site -->
                    <div class="mt-4">
                        <h4 class="text-lg font-medium">Données historiques du site</h4>
                         <div class="chart-container">
                            <div class="chart-wrapper">
                        <canvas id="chart-{{ $project->site->id }}" width="400" height="200"></canvas>
                             </div>
                        </div>
                    </div>

                 

                    <!-- Liste des blocs -->
                    <div class="row mt-4">
                        @foreach ($project->cultures as $culture)
                            <div class="col-md-4 mb-4">
                                <div class="project-card">
                                    <div class="card-header">Bloc - {{ $culture->name }}</div>
                                    <div class="card-body">
                                         @if($culture->latestSensorData)
                                            <div >
                                                <p id="temperature-{{ $culture->id }}">🌡️ <b>Température :</b> {{ $culture->latestSensorData->temperature }} °C</p>
                                                <p id="luminosity-{{ $culture->id }}">☀️ <b>Luminosité :</b> {{ $culture->latestSensorData->luminosity }} lux</p>
                                                <p id="co2-{{ $culture->id }}">🌬️ <b>CO2 :</b> {{ $culture->latestSensorData->co2_level }} ppm</p>
                                                <p id="soil_humidity-{{ $culture->id }}">💧 <b>Humidité sol :</b> {{ $culture->latestSensorData->soil_humidity }} %</p>
                                                <p id="updated_at-{{ $culture->id }}">🕒 <b>Mis à jour :</b> {{ $culture->latestSensorData->created_at->format('d/m/Y H:i') }}</p>
                                            </div>
                                        @else
                                            <p>Aucune donnée disponible pour le bloc "{{ $culture->name }}"</p>
                                        @endif
                                    

                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-green btn-custom" data-bs-toggle="modal" data-bs-target="#modifBlocModal-{{ $culture->id }}">
                                            <i class="bi bi-pencil-square"></i> Modifier
                                        </button>
                                        <form method="POST" action="{{ route('projects.detachCulture', [$culture->pivot->id]) }}" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer le bloc {{ $culture->name }} ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-red btn-custom" title="Supprimer">
                                                <i class="bi bi-trash"></i> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal modifier un bloc -->
                            <div class="modal fade" id="modifBlocModal-{{ $culture->id }}" tabindex="-1" aria-labelledby="modifBlocModalLabel-{{ $culture->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modifBlocModalLabel-{{ $culture->id }}">Modification du bloc <strong>{{ $culture->name }}</strong></h5>
                                            <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('projects.attachCulture', $project->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <div class="mb-3">
                                                    <label for="NomBloc-{{ $culture->id }}" class="form-label">Nom du bloc</label>
                                                    <input type="text" class="form-control" name="name" id="NomBloc-{{ $culture->id }}" value="{{ $culture->name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="CultureBloc-{{ $culture->id }}" class="form-label">Culture présente dans ce bloc</label>
                                                    <select class="form-select" name="culture_id" id="CultureBloc-{{ $culture->id }}" required>
                                                        @foreach ($cultures as $AvailableCulture)
                                                            <option value="{{ $AvailableCulture->id }}" {{ $AvailableCulture->id == $culture->id ? 'selected' : '' }}>
                                                                {{ $AvailableCulture->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ProjetBloc-{{ $culture->id }}" class="form-label">Projet contenant ce bloc</label>
                                                    <select class="form-select" name="project_id" id="ProjetBloc-{{ $culture->id }}" required>
                                                        @foreach ($projects as $AvailableProject)
                                                            <option value="{{ $AvailableProject->id }}" {{ $AvailableProject->id == $project->id ? 'selected' : '' }}>
                                                                {{ $AvailableProject->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-modal-green">Modifier ce bloc</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>

                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <button class="btn btn-green btn-custom" data-bs-toggle="modal" data-bs-target="#AjoutBlocModal-{{ $project->id }}"><i class="bi bi-plus-lg"></i> Ajouter un bloc</button>
                        <button class="btn btn-green btn-custom" data-bs-toggle="modal" data-bs-target="#modifProjetModal-{{ $project->id }}"><i class="bi bi-pencil-square"></i> Modifier ce Projet</button>
                        <form method="POST" action="{{ route('projects.destroy', [$project->id]) }}" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer le projet {{ $project->name }} ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-red btn-custom" title="Supprimer">
                                <i class="bi bi-trash"></i> Supprimer ce Projet
                            </button>
                        </form>
                    </div>

                    <!-- Modal ajouter un bloc -->
                    <div class="modal fade" id="AjoutBlocModal-{{ $project->id }}" tabindex="-1" aria-labelledby="AjoutBlocModalLabel-{{ $project->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="AjoutBlocModalLabel-{{ $project->id }}">Ajout d'un bloc dans le projet - {{ $project->name }}</h5>
                                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="bi bi-x-circle"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('projects.attachCulture', $project->id) }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="culture_id-{{ $project->id }}" class="form-label">Culture présente dans ce bloc</label>
                                            <select class="form-select" id="culture_id-{{ $project->id }}" name="culture_id" required>
                                                <option value="" selected disabled>Choisir une culture</option>
                                                @foreach ($cultures as $AvailableCulture)
                                                    <option value="{{ $AvailableCulture->id }}">{{ $AvailableCulture->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-modal-green">Ajouter ce bloc</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal modifier un projet -->
                    <div class="modal fade" id="modifProjetModal-{{ $project->id }}" tabindex="-1" aria-labelledby="modifProjetModalLabel-{{ $project->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modifProjetModalLabel-{{ $project->id }}">Modification(s) du projet <strong>{{ $project->name }}</strong></h5>
                                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="bi bi-x-circle"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('projects.update', $project->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="mb-3">
                                            <label for="nomProjet-{{ $project->id }}" class="form-label">Nom du projet</label>
                                            <input type="text" class="form-control" id="nomProjet-{{ $project->id }}" name="name" value="{{ $project->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="siteGeo-{{ $project->id }}" class="form-label">Sélectionnez un site géographique</label>
                                            <select class="form-select" id="siteGeo-{{ $project->id }}" name="site_id" required>
                                                @foreach ($sites as $site)
                                                    <option value="{{ $site->id }}" {{ $site->id == $project->site->id ? 'selected' : '' }}>{{ $site->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-modal-green">Modifier ce projet</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Modal pour ajouter un projet -->
            <div class="modal fade" id="ajoutProjetModal" tabindex="-1" aria-labelledby="ajoutProjetModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ajoutProjetModalLabel">Formulaire d'ajout d'un projet</h5>
                            <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                                <i class="bi bi-x-circle"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('projects.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="nomProjet" class="form-label">Nom du projet</label>
                                    <input type="text" name="name" class="form-control" id="nomProjet" placeholder="Entrez le nom du projet" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cultureProjet" class="form-label">Sélectionnez une culture <small class="text-muted">(qui sera présente dans le premier bloc de ce projet)</small></label>
                                    <select name="culture_id" class="form-select" id="cultureProjet" required>
                                        <option value="" selected disabled>Veuillez choisir...</option>
                                        @foreach ($cultures as $culture)
                                            <option value="{{ $culture->id }}">{{ $culture->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="siteGeographique" class="form-label">Sélectionnez un site géographique</label>
                                    <select name="site_id" class="form-select" id="siteGeographique" required>
                                        <option value="" selected disabled>Veuillez choisir...</option>
                                        @foreach ($sites as $site)
                                            <option value="{{ $site->id }}">{{ $site->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-modal-green">Créer ce projet</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

            

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const charts = {};
  const MAX_POINTS = 20; // nombre max de points dans le graphe

  // Initialiser un graphique vide par culture
  function initEmptyChart(cultureId) {
    const ctx = document.getElementById(`chart-${cultureId}`).getContext('2d');
    charts[cultureId] = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [],
        datasets: [
          { label: 'Température (°C)', data: [], borderColor: 'rgba(75, 192, 192, 1)', fill: false, tension: 0.1 },
          { label: 'Luminosité (lux)', data: [], borderColor: 'rgba(255, 99, 132, 1)', fill: false, tension: 0.1 },
          { label: 'Niveau CO2 (ppm)', data: [], borderColor: 'rgba(54, 162, 235, 1)', fill: false, tension: 0.1 },
          { label: 'Humidité du sol (%)', data: [], borderColor: 'rgba(255, 206, 86, 1)', fill: false, tension: 0.1 }
        ]
      },
      options: {
        responsive: true,
         maintainAspectRatio: false,
        scales: {
          x: { title: { display: true, text: 'Temps' } },
          y: { title: { display: true, text: 'Valeur' } }
        }
      }
    });
  }

  // Met à jour un graphe avec la nouvelle donnée latestSensorData
  function updateChartWithLatestData(cultureId, latestData) {
    if (!charts[cultureId] || !latestData) return;

    const chart = charts[cultureId];
    const timeLabel = new Date(latestData.created_at).toLocaleTimeString();

    chart.data.labels.push(timeLabel);
    if (chart.data.labels.length > MAX_POINTS) {
      chart.data.labels.shift();
    }

    chart.data.datasets[0].data.push(latestData.temperature ?? null);
    chart.data.datasets[1].data.push(latestData.luminosity ?? null);
    chart.data.datasets[2].data.push(latestData.co2_level ?? null);
    chart.data.datasets[3].data.push(latestData.soil_humidity ?? null);

    chart.data.datasets.forEach(dataset => {
      if (dataset.data.length > MAX_POINTS) {
        dataset.data.shift();
      }
    });

    chart.update();
  }

  // Fonction principale qui récupère les données et met à jour tout
  async function fetchAndUpdateAll() {
    try {
      const response = await fetch('/projets/latest-data');
      if (!response.ok) {
        console.error('Erreur HTTP:', response.status);
        return;
      }
      const cultures = await response.json();

      cultures.forEach(culture => {
        const id = culture.id;

        // Mettre à jour le texte des données en temps réel
        if (culture.latestSensorData) {
          document.getElementById(`temperature-${id}`).textContent = `🌡️ Température : ${culture.latestSensorData.temperature} °C`;
          document.getElementById(`luminosity-${id}`).textContent = `☀️ Luminosité : ${culture.latestSensorData.luminosity} lux`;
          document.getElementById(`co2-${id}`).textContent = `🌬️ CO2 : ${culture.latestSensorData.co2_level} ppm`;
          document.getElementById(`soil_humidity-${id}`).textContent = `💧 Humidité sol : ${culture.latestSensorData.soil_humidity} %`;
          document.getElementById(`updated_at-${id}`).textContent = `🕒 Mis à jour : ${new Date(culture.latestSensorData.created_at).toLocaleString()}`;

          // Mettre à jour le graphique
          updateChartWithLatestData(id, culture.latestSensorData);
        } else {
          // Pas de données
          document.getElementById(`temperature-${id}`).textContent = "Pas de données disponibles";
          // etc. pour les autres éléments si besoin
        }
      });
    } catch (error) {
      console.error('Erreur lors de la récupération des données:', error);
    }
  }

  // Initialisation : on crée les graphes vides pour chaque culture
  // Ici tu peux utiliser Blade pour générer ce JS, ou une boucle JS si tu as les ids côté client
  @foreach ($projects as $project)
    @foreach ($project->cultures as $culture)
      initEmptyChart({{ $culture->id }});
    @endforeach
  @endforeach

  // Rafraîchir les données + graphes toutes les 5 secondes
  setInterval(fetchAndUpdateAll, 5000);

  // Premier appel direct au chargement
  fetchAndUpdateAll();

</script>

        </div>
    </div>
    <script>
    async function fetchLatestData() {
        try {
            const response = await fetch('/projets/latest-data');
            const cultures = await response.json();

            cultures.forEach(culture => {
                const id = culture.id;

                if (culture.latestSensorData) {
                    document.getElementById(`temperature-${id}`).textContent = `🌡️ Température : ${culture.latestSensorData.temperature} °C`;
                    document.getElementById(`luminosity-${id}`).textContent = `☀️ Luminosité : ${culture.latestSensorData.luminosity} lux`;
                    document.getElementById(`co2-${id}`).textContent = `🌬️ CO2 : ${culture.latestSensorData.co2_level} ppm`;
                    document.getElementById(`soil_humidity-${id}`).textContent = `💧 Humidité sol : ${culture.latestSensorData.soil_humidity} %`;
                    document.getElementById(`updated_at-${id}`).textContent = `🕒 Mis à jour : ${new Date(culture.latestSensorData.created_at).toLocaleString()}`;
                } else {
                    // Si aucune donnée, tu peux afficher un message ou laisser tel quel
                    document.getElementById(`temperature-${id}`).textContent = "Pas de données disponibles";
                    // Idem pour les autres champs si besoin
                }
            });
        } catch (error) {
            console.error('Erreur lors de la récupération des données:', error);
        }
    }

    // Rafraîchit toutes les 3 secondes
    setInterval(fetchLatestData, 3000);

    // Appelle une première fois au chargement
    fetchLatestData();
</script>

</x-app-layout>
