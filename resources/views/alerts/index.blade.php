@php
            $alerts = [
                [ 'id' => 1, 'culture' => 'Blé', 'projet' => 'Projet A' ],
                [ 'id' => 2, 'culture' => 'Maïs', 'projet' => 'Projet B' ]
            ];
@endphp
<x-app-layout>
<div class = "content">

<div class="container mt-5">
        <h2 class="mb-4">Gestion des Alertes</h2>
        @if (count($alerts) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Culture</th>
                        <th>Projet</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alerts as $alert)
                        <tr>
                            <td>{{ $alert['id'] }}</td>
                            <td>{{ $alert['culture'] }}</td>
                            <td>{{ $alert['projet'] }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm">Voir</button>
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
   
        @else
        <div class="text-center mt-5">
    <div class="alert-container">
        <img src="https://cdn-icons-png.flaticon.com/512/190/190406.png" alt="No Alerts" class="alert-icon">
        <p class="alert-text">Aucune alerte</p>
    </div>

        @endif
    </div>
</div>
</div>

<style>
.content {
    margin-left: 50px; /* Décalage pour ne pas chevaucher la sidebar */
    padding: 20px;
}
.container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 128, 0, 0.2);
        }
        h2 {
            color: #155724;
            text-align: center;
            font-weight: bold;
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        .table thead {
            background-color: #28a745;
            color: white;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-primary:hover {
            background-color: #218838;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .text-muted {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .alert-container {
        background: white;
        padding: 30px;
        border-radius: 10px;
      
        display: inline-block;
    }
    .alert-icon {
        width: 100px;
        justify: center;
    }
    .alert-text {
        color: #155724;
        font-size: 1.5rem;
        font-weight: bold;
        margin-top: 10px;
        justify: center;
    }
</style>
</x-app-layout>