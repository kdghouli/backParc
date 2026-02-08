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
                    <h3>12</h3>
                    <p>Contrôles conformes</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-box stats-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h3>5</h3>
                    <p>Contrôles avec réserves</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-box stats-danger">
                    <i class="fas fa-times-circle"></i>
                    <h3>3</h3>
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
                        <option value="2">MS 359 - Toyota</option>
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="date" class="form-control" id="dateFilter">
                </div>
            </div>
        </div>

        <div id="controlsContainer">
            <!-- Les contrôles techniques seront affichés ici -->
        </div>

        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
            </ul>
        </nav>
    </div>

    <footer class="text-center">
        <div class="container">
            <p>© 2023 Gestion de Parc Auto | Département Maintenance</p>
        </div>
    </footer>

    <script>
        // Données des contrôles techniques
        const data = [
            {
                "id": 1,
                "dateControle": "2025-08-20",
                "frein": 1,
                "pneus": 1,
                "eclairage": 1,
                "extincteur": 1,
                "batterie": 1,
                "fuite": 1,
                "avertisseur": 1,
                "ceinture": 1,
                "retroviseur": 1,
                "observation": "fdsfds",
                "kilometrage": "32365",
                "vhl_id": 2,
                "user_id": 8,
                "utilisateur_id": 1,
                "created_at": "2025-08-20T19:25:22.000000Z",
                "updated_at": "2025-08-20T19:25:22.000000Z",
                "vhl": {
                    "id": 2,
                    "matricule": "Ms 359",
                    "marque": "Toyota",
                    "type": null,
                    "ww": null,
                    "chassis": null,
                    "puissance": null,
                    "date_mc": null,
                    "equipement": "359",
                    "observation": null,
                    "created_at": null,
                    "agence_id": 1,
                    "categorie_id": 4,
                    "intitule_id": 6,
                    "service_id": 4,
                    "utilisateur_id": 10,
                    "statut_id": 5
                },
                "user": {
                    "id": 8,
                    "name": "assia",
                    "email": "a@a.a",
                    "email_verified_at": null,
                    "image": null
                },
                "utilisateur": {
                    "id": 1,
                    "nom": "Semlali Abderrahim",
                    "poste": "SAV",
                    "tel": "0661122026",
                    "mail": "SDFGDF@DFGDF.FD\n",
                    "service_id": 2,
                    "created_at": null,
                    "updated_at": null,
                    "agence_id": 1
                }
            },
            {
                "id": 2,
                "dateControle": "2025-08-20",
                "frein": 0,
                "pneus": 1,
                "eclairage": 1,
                "extincteur": 1,
                "batterie": 0,
                "fuite": 1,
                "avertisseur": 0,
                "ceinture": 0,
                "retroviseur": 0,
                "observation": "mmm",
                "kilometrage": "65",
                "vhl_id": 2,
                "user_id": 8,
                "utilisateur_id": 1,
                "created_at": "2025-08-20T19:33:07.000000Z",
                "updated_at": "2025-08-20T19:33:07.000000Z",
                "vhl": {
                    "id": 2,
                    "matricule": "Ms 359",
                    "marque": "Toyota",
                    "type": null,
                    "ww": null,
                    "chassis": null,
                    "puissance": null,
                    "date_mc": null,
                    "equipement": "359",
                    "observation": null,
                    "created_at": null,
                    "agence_id": 1,
                    "categorie_id": 4,
                    "intitule_id": 6,
                    "service_id": 4,
                    "utilisateur_id": 10,
                    "statut_id": 5
                },
                "user": {
                    "id": 8,
                    "name": "assia",
                    "email": "a@a.a",
                    "email_verified_at": null,
                    "image": null
                },
                "utilisateur": {
                    "id": 1,
                    "nom": "Semlali Abderrahim",
                    "poste": "SAV",
                    "tel": "0661122026",
                    "mail": "SDFGDF@DFGDF.FD\n",
                    "service_id": 2,
                    "created_at": null,
                    "updated_at": null,
                    "agence_id": 1
                }
            },
            {
                "id": 3,
                "dateControle": "2025-08-20",
                "frein": 1,
                "pneus": 0,
                "eclairage": 0,
                "extincteur": 0,
                "batterie": 0,
                "fuite": 0,
                "avertisseur": 0,
                "ceinture": 0,
                "retroviseur": 0,
                "observation": null,
                "kilometrage": "897",
                "vhl_id": 2,
                "user_id": 8,
                "utilisateur_id": 1,
                "created_at": "2025-08-20T19:34:41.000000Z",
                "updated_at": "2025-08-20T19:34:41.000000Z",
                "vhl": {
                    "id": 2,
                    "matricule": "Ms 359",
                    "marque": "Toyota",
                    "type": null,
                    "ww": null,
                    "chassis": null,
                    "puissance": null,
                    "date_mc": null,
                    "equipement": "359",
                    "observation": null,
                    "created_at": null,
                    "agence_id": 1,
                    "categorie_id": 4,
                    "intitule_id": 6,
                    "service_id": 4,
                    "utilisateur_id": 10,
                    "statut_id": 5
                },
                "user": {
                    "id": 8,
                    "name": "assia",
                    "email": "a@a.a",
                    "email_verified_at": null,
                    "image": null
                },
                "utilisateur": {
                    "id": 1,
                    "nom": "Semlali Abderrahim",
                    "poste": "SAV",
                    "tel": "0661122026",
                    "mail": "SDFGDF@DFGDF.FD\n",
                    "service_id": 2,
                    "created_at": null,
                    "updated_at": null,
                    "agence_id": 1
                }
            },
            {
                "id": 4,
                "dateControle": "2025-08-20",
                "frein": 0,
                "pneus": 0,
                "eclairage": 1,
                "extincteur": 0,
                "batterie": 0,
                "fuite": 1,
                "avertisseur": 0,
                "ceinture": 0,
                "retroviseur": 0,
                "observation": null,
                "kilometrage": "999",
                "vhl_id": 2,
                "user_id": 8,
                "utilisateur_id": 1,
                "created_at": "2025-08-20T19:35:55.000000Z",
                "updated_at": "2025-08-20T19:35:55.000000Z",
                "vhl": {
                    "id": 2,
                    "matricule": "Ms 359",
                    "marque": "Toyota",
                    "type": null,
                    "ww": null,
                    "chassis": null,
                    "puissance": null,
                    "date_mc": null,
                    "equipement": "359",
                    "observation": null,
                    "created_at": null,
                    "agence_id": 1,
                    "categorie_id": 4,
                    "intitule_id": 6,
                    "service_id": 4,
                    "utilisateur_id": 10,
                    "statut_id": 5
                },
                "user": {
                    "id": 8,
                    "name": "assia",
                    "email": "a@a.a",
                    "email_verified_at": null,
                    "image": null
                },
                "utilisateur": {
                    "id": 1,
                    "nom": "Semlali Abderrahim",
                    "poste": "SAV",
                    "tel": "0661122026",
                    "mail": "SDFGDF@DFGDF.FD\n",
                    "service_id": 2,
                    "created_at": null,
                    "updated_at": null,
                    "agence_id": 1
                }
            },
            {
                "id": 5,
                "dateControle": "2025-08-20",
                "frein": 1,
                "pneus": 1,
                "eclairage": 1,
                "extincteur": 1,
                "batterie": 0,
                "fuite": 0,
                "avertisseur": 0,
                "ceinture": 0,
                "retroviseur": 0,
                "observation": null,
                "kilometrage": "65645",
                "vhl_id": 2,
                "user_id": 8,
                "utilisateur_id": 1,
                "created_at": "2025-08-20T19:53:01.000000Z",
                "updated_at": "2025-08-20T19:53:01.000000Z",
                "vhl": {
                    "id": 2,
                    "matricule": "Ms 359",
                    "marque": "Toyota",
                    "type": null,
                    "ww": null,
                    "chassis": null,
                    "puissance": null,
                    "date_mc": null,
                    "equipement": "359",
                    "observation": null,
                    "created_at": null,
                    "agence_id": 1,
                    "categorie_id": 4,
                    "intitule_id": 6,
                    "service_id": 4,
                    "utilisateur_id": 10,
                    "statut_id": 5
                },
                "user": {
                    "id": 8,
                    "name": "assia",
                    "email": "a@a.a",
                    "email_verified_at": null,
                    "image": null
                },
                "utilisateur": {
                    "id": 1,
                    "nom": "Semlali Abderrahim",
                    "poste": "SAV",
                    "tel": "0661122026",
                    "mail": "SDFGDF@DFGDF.FD\n",
                    "service_id": 2,
                    "created_at": null,
                    "updated_at": null,
                    "agence_id": 1
                }
            },
            {
                "id": 6,
                "dateControle": "2025-08-20",
                "frein": 0,
                "pneus": 1,
                "eclairage": 1,
                "extincteur": 1,
                "batterie": 0,
                "fuite": 1,
                "avertisseur": 0,
                "ceinture": 1,
                "retroviseur": 1,
                "observation": null,
                "kilometrage": "544",
                "vhl_id": 2,
                "user_id": 8,
                "utilisateur_id": 1,
                "created_at": "2025-08-20T19:55:55.000000Z",
                "updated_at": "2025-08-20T19:55:55.000000Z",
                "vhl": {
                    "id": 2,
                    "matricule": "Ms 359",
                    "marque": "Toyota",
                    "type": null,
                    "ww": null,
                    "chassis": null,
                    "puissance": null,
                    "date_mc": null,
                    "equipement": "359",
                    "observation": null,
                    "created_at": null,
                    "agence_id": 1,
                    "categorie_id": 4,
                    "intitule_id": 6,
                    "service_id": 4,
                    "utilisateur_id": 10,
                    "statut_id": 5
                },
                "user": {
                    "id": 8,
                    "name": "assia",
                    "email": "a@a.a",
                    "email_verified_at": null,
                    "image": null
                },
                "utilisateur": {
                    "id": 1,
                    "nom": "Semlali Abderrahim",
                    "poste": "SAV",
                    "tel": "0661122026",
                    "mail": "SDFGDF@DFGDF.FD\n",
                    "service_id": 2,
                    "created_at": null,
                    "updated_at": null,
                    "agence_id": 1
                }
            }
        ];

        // Fonction pour afficher les contrôles
        function displayControls(controls) {
            const container = document.getElementById('controlsContainer');
            container.innerHTML = '';

            if (controls.length === 0) {
                container.innerHTML = `
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle me-2"></i>Aucun contrôle technique trouvé.
                    </div>
                `;
                return;
            }

            controls.forEach(control => {
                // Calcul du statut global
                const points = Object.keys(control).filter(key =>
                    ['frein', 'pneus', 'eclairage', 'extincteur', 'batterie', 'fuite', 'avertisseur', 'ceinture', 'retroviseur'].includes(key)
                ).reduce((acc, key) => acc + control[key], 0);

                let statusClass = 'status-danger';
                if (points >= 8) statusClass = 'status-ok';
                else if (points >= 5) statusClass = 'status-warning';

                const controlElement = document.createElement('div');
                controlElement.className = 'card mb-4';
                controlElement.innerHTML = `
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-car me-2"></i>
                            ${control.vhl.matricule} - ${control.vhl.marque}
                            <span class="badge ${statusClass} ms-2">${points}/9</span>
                        </div>
                        <div>
                            <span class="badge bg-light text-dark me-2">
                                <i class="fas fa-calendar me-1"></i>${new Date(control.dateControle).toLocaleDateString('fr-FR')}
                            </span>
                            <span class="badge bg-light text-dark">
                                <i class="fas fa-tachometer-alt me-1"></i>${control.kilometrage} km
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="vehicle-info mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong><i class="fas fa-id-card me-2"></i>Contrôle effectué par:</strong> ${control.utilisateur.nom}
                                </div>
                                <div class="col-md-6">
                                    <strong><i class="fas fa-briefcase me-2"></i>Poste:</strong> ${control.utilisateur.poste}
                                </div>
                            </div>
                        </div>

                        <h5 class="mb-3"><i class="fas fa-check-circle me-2"></i>Points de contrôle</h5>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <span class="${control.frein ? 'text-success' : 'text-danger'}">
                                    <i class="fas ${control.frein ? 'fa-check' : 'fa-times'} me-2"></i>Freins
                                </span>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="${control.pneus ? 'text-success' : 'text-danger'}">
                                    <i class="fas ${control.pneus ? 'fa-check' : 'fa-times'} me-2"></i>Pneus
                                </span>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="${control.eclairage ? 'text-success' : 'text-danger'}">
                                    <i class="fas ${control.eclairage ? 'fa-check' : 'fa-times'} me-2"></i>Éclairage
                                </span>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="${control.extincteur ? 'text-success' : 'text-danger'}">
                                    <i class="fas ${control.extincteur ? 'fa-check' : 'fa-times'} me-2"></i>Extincteur
                                </span>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="${control.batterie ? 'text-success' : 'text-danger'}">
                                    <i class="fas ${control.batterie ? 'fa-check' : 'fa-times'} me-2"></i>Batterie
                                </span>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="${control.fuite ? 'text-success' : 'text-danger'}">
                                    <i class="fas ${control.fuite ? 'fa-check' : 'fa-times'} me-2"></i>Fuite
                                </span>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="${control.avertisseur ? 'text-success' : 'text-danger'}">
                                    <i class="fas ${control.avertisseur ? 'fa-check' : 'fa-times'} me-2"></i>Avertisseur
                                </span>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="${control.ceinture ? 'text-success' : 'text-danger'}">
                                    <i class="fas ${control.ceinture ? 'fa-check' : 'fa-times'} me-2"></i>Ceinture
                                </span>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="${control.retroviseur ? 'text-success' : 'text-danger'}">
                                    <i class="fas ${control.retroviseur ? 'fa-check' : 'fa-times'} me-2"></i>Rétroviseur
                                </span>
                            </div>
                        </div>

                        ${control.observation ? `
                            <div class="mt-3">
                                <h5><i class="fas fa-comment me-2"></i>Observations</h5>
                                <p class="p-3 bg-light rounded">${control.observation}</p>
                            </div>
                        ` : ''}
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between">
                        <small>Contrôle #${control.id}</small>
                        <small>Effectué le ${new Date(control.created_at).toLocaleString('fr-FR')}</small>
                    </div>
                `;
                container.appendChild(controlElement);
            });
        }

        // Filtrer les contrôles
        function filterControls() {
            const searchText = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            const vehicleFilter = document.getElementById('vehicleFilter').value;
            const dateFilter = document.getElementById('dateFilter').value;

            const filtered = data.filter(control => {
                // Filtre par recherche texte
                if (searchText && !(
                    control.vhl.matricule.toLowerCase().includes(searchText) ||
                    control.vhl.marque.toLowerCase().includes(searchText) ||
                    control.utilisateur.nom.toLowerCase().includes(searchText) ||
                    (control.observation && control.observation.toLowerCase().includes(searchText))
                )) {
                    return false;
                }

                // Filtre par statut
                if (statusFilter) {
                    const points = Object.keys(control).filter(key =>
                        ['frein', 'pneus', 'eclairage', 'extincteur', 'batterie', 'fuite', 'avertisseur', 'ceinture', 'retroviseur'].includes(key)
                    ).reduce((acc, key) => acc + control[key], 0);

                    if (statusFilter === 'ok' && points < 8) return false;
                    if (statusFilter === 'warning' && (points < 5 || points >= 8)) return false;
                    if (statusFilter === 'danger' && points >= 5) return false;
                }

                // Filtre par véhicule
                if (vehicleFilter && control.vhl_id != vehicleFilter) {
                    return false;
                }

                // Filtre par date
                if (dateFilter && control.dateControle !== dateFilter) {
                    return false;
                }

                return true;
            });

            displayControls(filtered);
        }

        // Initialiser les événements
        document.getElementById('searchInput').addEventListener('input', filterControls);
        document.getElementById('statusFilter').addEventListener('change', filterControls);
        document.getElementById('vehicleFilter').addEventListener('change', filterControls);
        document.getElementById('dateFilter').addEventListener('change', filterControls);

        // Afficher tous les contrôles au chargement
        displayControls(data);
    </script>
</body>
</html>
