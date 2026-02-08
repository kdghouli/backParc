<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrôles Techniques - Gestion de Parc Auto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --success-color: #2ecc71;
            --danger-color: #e74c3c;
            --warning-color: #f39c12;
            --light-color: #ecf0f1;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 10px 10px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin-bottom: 20px;
            border: none;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            border-radius: 10px 10px 0 0 !important;
            font-weight: bold;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: bold;
        }

        .status-ok {
            background-color: var(--success-color);
            color: white;
        }

        .status-warning {
            background-color: var(--warning-color);
            color: white;
        }

        .status-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .vehicle-info {
            background-color: var(--light-color);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .filter-section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .stats-box {
            text-align: center;
            padding: 15px;
            border-radius: 8px;
            color: white;
            margin-bottom: 20px;
        }

        .stats-box i {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .stats-ok {
            background: linear-gradient(135deg, var(--success-color), #27ae60);
        }

        .stats-warning {
            background: linear-gradient(135deg, var(--warning-color), #e67e22);
        }

        .stats-danger {
            background: linear-gradient(135deg, var(--danger-color), #c0392b);
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem 0;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1><i class="fas fa-car-side me-3"></i>Contrôles Techniques</h1>
                    <p class="lead">Gestion du parc automobile de l'entreprise</p>
                </div>
                <div class="col-md-6 text-end">
                    <button class="btn btn-light me-2"><i class="fas fa-print me-1"></i> Imprimer</button>
                    <button class="btn btn-light"><i class="fas fa-download me-1"></i> Exporter</button>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="stats-box stats-ok">
                    <i class="fas fa-check-circle"></i>
                    <h3>{{ $stats['conformes'] }}</h3>
                    <p>Contrôles conformes</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-box stats-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h3>{{ $stats['reserves'] }}</h3>
                    <p>Contrôles avec réserves</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-box stats-danger">
                    <i class="fas fa-times-circle"></i>
                    <h3>{{ $stats['non_conformes'] }}</h3>
                    <p>Contrôles non conformes</p>
                </div>
            </div>
        </div>

        <div class="filter-section">
            <div class="row">
                <div class="col-md-3 mb-2">
                    <input type="text" class="form-control" placeholder="Rechercher..." id="searchInput">
                </div>
                <div class="col-md-3 mb-2">
                    <select class="form-select" id="statusFilter">
                        <option value="">Tous les statuts</option>
                        <option value="ok">Conforme</option>
                        <option value="warning">Avec réserves</option>
                        <option value="danger">Non conforme</option>
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <select class="form-select" id="vehicleFilter">
                        <option value="">Tous les véhicules</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}">{{ $vehicle->matricule }} - {{ $vehicle->marque }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="date" class="form-control" id="dateFilter">
                </div>
            </div>
        </div>

        <div id="controlsContainer">
            @forelse($data as $control)
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-car me-2"></i>
                            {{ $control['vhl']['matricule'] }} - {{ $control['vhl']['marque'] }}
                            @php
                                $points = $control['frein'] + $control['pneus'] + $control['eclairage'] +
                                         $control['extincteur'] + $control['batterie'] + $control['fuite'] +
                                         $control['avertisseur'] + $control['ceinture'] + $control['retroviseur'];

                                if ($points >= 8) {
                                    $statusClass = 'status-ok';
                                } elseif ($points >= 5) {
                                    $statusClass = 'status-warning';
                                } else {
                                    $statusClass = 'status-danger';
                                }
                            @endphp
                            <span class="badge {{ $statusClass }} ms-2">{{ $points }}/9</span>
                        </div>
                        <div>
                            <span class="badge bg-light text-dark me-2">
                                <i class="fas fa-calendar me-1"></i>{{ \Carbon\Carbon::parse($control['dateControle'])->format('d/m/Y') }}
                            </span>
                            <span class="badge bg-light text-dark">
                                <i class="fas fa-tachometer-alt me-1"></i>{{ $control['kilometrage'] }} km
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="vehicle-info mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong><i class="fas fa-id-card me-2"></i>Contrôle effectué par:</strong> {{ $control['utilisateur']['nom'] }}
                                </div>
                                <div class="col-md-6">
                                    <strong><i class="fas fa-briefcase me-2"></i>Poste:</strong> {{ $control['utilisateur']['poste'] }}
                                </div>
                            </div>
                        </div>

                        <h5 class="mb-3"><i class="fas fa-check-circle me-2"></i>Points de contrôle</h5>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <span class="{{ $control['frein'] ? 'text-success' : 'text-danger' }}">
                                    <i class="fas {{ $control['frein'] ? 'fa-check' : 'fa-times' }} me-2"></i>Freins
                                </span>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="{{ $control['pneus'] ? 'text-success' : 'text-danger' }}">
                                    <i class="fas {{ $control['pneus'] ? 'fa-check' : 'fa-times' }} me-2"></i>Pneus
                                </span>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="{{ $control['eclairage'] ? 'text-success' : 'text-danger' }}">
                                    <i class="fas {{ $control['eclairage'] ? 'fa-check' : 'fa-times' }} me-2"></i>Éclairage
                                </span>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="{{ $control['extincteur'] ? 'text-success' : 'text-danger' }}">
                                    <i class="fas {{ $control['extincteur'] ? 'fa-check' : 'fa-times' }} me-2"></i>Extincteur
                                </span>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="{{ $control['batterie'] ? 'text-success' : 'text-danger' }}">
                                    <i class="fas {{ $control['batterie'] ? 'fa-check' : 'fa-times' }} me-2"></i>Batterie
                                </span>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="{{ $control['fuite'] ? 'text-success' : 'text-danger' }}">
                                    <i class="fas {{ $control['fuite'] ? 'fa-check' : 'fa-times' }} me-2"></i>Fuite
                                </span>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="{{ $control['avertisseur'] ? 'text-success' : 'text-danger' }}">
                                    <i class="fas {{ $control['avertisseur'] ? 'fa-check' : 'fa-times' }} me-2"></i>Avertisseur
                                </span>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="{{ $control['ceinture'] ? 'text-success' : 'text-danger' }}">
                                    <i class="fas {{ $control['ceinture'] ? 'fa-check' : 'fa-times' }} me-2"></i>Ceinture
                                </span>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="{{ $control['retroviseur'] ? 'text-success' : 'text-danger' }}">
                                    <i class="fas {{ $control['retroviseur'] ? 'fa-check' : 'fa-times' }} me-2"></i>Rétroviseur
                                </span>
                            </div>
                        </div>

                        @if($control['observation'])
                            <div class="mt-3">
                                <h5><i class="fas fa-comment me-2"></i>Observations</h5>
                                <p class="p-3 bg-light rounded">{{ $control['observation'] }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between">
                        <small>Contrôle #{{ $control['id'] }}</small>
                        <small>Effectué le {{ \Carbon\Carbon::parse($control['created_at'])->format('d/m/Y à H:i') }}</small>
                    </div>
                </div>
            @empty
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle me-2"></i>Aucun contrôle technique trouvé.
                </div>
            @endforelse
        </div>

        @if($data->hasPages())
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    @if($data->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Précédent</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $data->previousPageUrl() }}">Précédent</a></li>
                    @endif

                    @foreach(range(1, $data->lastPage()) as $page)
                        <li class="page-item {{ $data->currentPage() == $page ? 'active' : '' }}">
                            <a class="page-link" href="{{ $data->url($page) }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    @if($data->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $data->nextPageUrl() }}">Suivant</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Suivant</span></li>
                    @endif
                </ul>
            </nav>
        @endif
    </div>

    <footer class="text-center">
        <div class="container">
            <p>© {{ date('Y') }} Gestion de Parc Auto | Département Maintenance</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Filtrer les contrôles
        function filterControls() {
            const searchText = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            const vehicleFilter = document.getElementById('vehicleFilter').value;
            const dateFilter = document.getElementById('dateFilter').value;

            const controls = document.querySelectorAll('#controlsContainer .card');

            controls.forEach(control => {
                const matricule = control.querySelector('.card-header').textContent.toLowerCase();
                const points = parseInt(control.querySelector('.badge').textContent);
                const date = control.querySelector('.badge.bg-light').textContent.includes('/') ?
                            control.querySelector('.badge.bg-light').textContent.split(' ')[1] : '';

                let statusMatch = true;
                if (statusFilter) {
                    if (statusFilter === 'ok' && points < 8) statusMatch = false;
                    if (statusFilter === 'warning' && (points < 5 || points >= 8)) statusMatch = false;
                    if (statusFilter === 'danger' && points >= 5) statusMatch = false;
                }

                const textMatch = !searchText || matricule.includes(searchText);
                const dateMatch = !dateFilter || date === new Date(dateFilter).toLocaleDateString('fr-FR');

                if (textMatch && statusMatch && dateMatch) {
                    control.style.display = 'block';
                } else {
                    control.style.display = 'none';
                }
            });
        }

        // Initialiser les événements
        document.getElementById('searchInput').addEventListener('input', filterControls);
        document.getElementById('statusFilter').addEventListener('change', filterControls);
        document.getElementById('vehicleFilter').addEventListener('change', filterControls);
        document.getElementById('dateFilter').addEventListener('change', filterControls);
    </script>
</body>
</html>
