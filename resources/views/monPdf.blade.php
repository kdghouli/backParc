


<!-- resources/views/dailychecks/index.blade.php -->
@extends('index.app')

@section('content')
<div class="container">
    <h1>Contrôles Journaliers</h1>

    <!-- Filtres -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Filtres</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('dailychecks.index') }}">
                <div class="row">
                    <div class="col-md-3">
                        <label for="date_debut">Date début</label>
                        <input type="date" name="date_debut" id="date_debut"
                               class="form-control" value="{{ request('date_debut') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="date_fin">Date fin</label>
                        <input type="date" name="date_fin" id="date_fin"
                               class="form-control" value="{{ request('date_fin') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="vhl_id">Véhicule</label>
                        <select name="vhl_id" id="vhl_id" class="form-control">
                            <option value="">Tous les véhicules</option>
                            @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}"
                                    {{ request('vhl_id') == $vehicle->id ? 'selected' : '' }}>
                                    {{ $vehicle->matricule }} - {{ $vehicle->marque }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="utilisateur_id">Contrôleur</label>
                        <select name="utilisateur_id" id="utilisateur_id" class="form-control">
                            <option value="">Tous les contrôleurs</option>
                            @foreach($utilisateurs as $utilisateur)
                                <option value="{{ $utilisateur->id }}"
                                    {{ request('utilisateur_id') == $utilisateur->id ? 'selected' : '' }}>
                                    {{ $utilisateur->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-filter"></i> Filtrer
                        </button>
                        <a href="{{ route('dailychecks.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Réinitialiser
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tableau -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Liste des contrôles</h5>
                <a href="{{ route('dailychecks.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Nouveau contrôle
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Véhicule</th>
                            <th>Kilométrage</th>
                            <th>Contrôleur</th>
                            <th>Freins</th>
                            <th>Pneus</th>
                            <th>Éclairage</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dailychecks as $check)
                            <tr>
                                <td>{{ $check->dateControle->format('d/m/Y') }}</td>
                                <td>{{ $check->vhl->matricule }} - {{ $check->vhl->marque }}</td>
                                <td>{{ number_format($check->kilometrage, 0, ',', ' ') }} km</td>
                                <td>{{ $check->utilisateur->nom }}</td>
                                <td>
                                    <span class="badge bg-{{ $check->frein ? 'success' : 'danger' }}">
                                        {{ $check->frein ? 'OK' : 'NOK' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $check->pneus ? 'success' : 'danger' }}">
                                        {{ $check->pneus ? 'OK' : 'NOK' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $check->eclairage ? 'success' : 'danger' }}">
                                        {{ $check->eclairage ? 'OK' : 'NOK' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('dailychecks.show', $check->id) }}"
                                       class="btn btn-info btn-sm" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('dailychecks.edit', $check->id)"
                                       class="btn btn-warning btn-sm" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('dailychecks.destroy', $check->id) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                title="Supprimer" onclick="return confirm('Êtes-vous sûr ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Aucun contrôle trouvé</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($dailychecks->hasPages())
                <div class="d-flex justify-content-center mt-3">
                    {{ $dailychecks->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Script pour gérer les dates par défaut
    document.addEventListener('DOMContentLoaded', function() {
        // Date début : il y a 30 jours
        if (!document.getElementById('date_debut').value) {
            const dateDebut = new Date();
            dateDebut.setDate(dateDebut.getDate() - 30);
            document.getElementById('date_debut').value = dateDebut.toISOString().split('T')[0];
        }

        // Date fin : aujourd'hui
        if (!document.getElementById('date_fin').value) {
            document.getElementById('date_fin').value = new Date().toISOString().split('T')[0];
        }
    });
</script>
@endsection
