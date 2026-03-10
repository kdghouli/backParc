<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bienvenue sur Notre Plateforme</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Animation CSS -->
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .animate-fade-in {
            animation: fadeInUp 0.8s ease-out;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-pulse-slow {
            animation: pulse 2s ease-in-out infinite;
        }

        .feature-card {
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px -15px rgba(0,0,0,0.2);
        }

        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background: #4F46E5;
            opacity: 0.6;
            pointer-events: none;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-50 via-white to-purple-50 min-h-screen">

    <!-- Navigation Simple -->
    <nav class="bg-white/80 backdrop-blur-md shadow-sm fixed w-full z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <i class="fas fa-star text-indigo-600 text-2xl mr-2 animate-pulse-slow"></i>
                    <span class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        {{ config('app.name', 'Laravel') }}
                    </span>
                </div>
                <div class="flex items-center space-x-4">
                    {{-- <a href="{{ route('login') }}" class="text-gray-600 hover:text-indigo-600 transition-colors"> --}}
                        <i class="fas fa-sign-in-alt mr-1"></i> Connexion
                    </a>
                    {{-- <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors"> --}}
                        S'inscrire
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-24 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">

            <!-- Message de Bienvenue Principal -->
            <div class="text-center mb-12 animate-fade-in">
                <div class="inline-block mb-4">
                    <span class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold">
                        <i class="fas fa-check-circle mr-1"></i> Inscription réussie !
                    </span>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Bienvenue,
                    <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        {{ $userData['name'] }}!
                    </span>
                </h1>

                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Nous sommes ravis de vous compter parmi nous. Votre aventure commence maintenant !
                </p>
            </div>

            <!-- Carte Profil et Stats -->
            <div class="grid md:grid-cols-3 gap-8 mb-12 animate-fade-in" style="animation-delay: 0.2s">

                <!-- Carte Profil -->
                <div class="bg-white rounded-2xl shadow-xl p-6 col-span-1">
                    <div class="text-center">
                        <div class="relative inline-block">
                            <img src="{{ $userData['avatar'] }}"
                                 alt="{{ $userData['name'] }}"
                                 class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-indigo-100 animate-float">
                            <div class="absolute bottom-4 right-0 bg-green-400 w-5 h-5 rounded-full border-2 border-white"></div>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $userData['name'] }}</h2>
                        <p class="text-gray-500">{{ $userData['email'] }}</p>

                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Membre depuis:</span>
                                <span class="font-semibold text-indigo-600">
                                    {{ $userData['created_at']->format('d/m/Y') }}
                                </span>
                            </div>
                            <div class="flex justify-between text-sm mt-2">
                                <span class="text-gray-500">Type de compte:</span>
                                <span class="font-semibold text-indigo-600">
                                    {{ $userData['membership'] }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cartes Statistiques -->
                <div class="md:col-span-2 grid grid-cols-2 gap-4">
                    <!-- Jours membre -->
                    <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-transform">
                        <div class="flex items-center">
                            <div class="bg-blue-100 rounded-lg p-3">
                                <i class="fas fa-calendar-alt text-blue-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Jours membre</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $stats['jours_membre'] }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Connexions -->
                    <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-transform">
                        <div class="flex items-center">
                            <div class="bg-green-100 rounded-lg p-3">
                                <i class="fas fa-sign-in-alt text-green-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Connexions</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $stats['connexions'] }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Points Fidélité -->
                    <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-transform">
                        <div class="flex items-center">
                            <div class="bg-purple-100 rounded-lg p-3">
                                <i class="fas fa-gem text-purple-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Points fidélité</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $stats['points_fidelite'] }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Offres disponibles -->
                    <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-transform">
                        <div class="flex items-center">
                            <div class="bg-yellow-100 rounded-lg p-3">
                                <i class="fas fa-tag text-yellow-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Offres disponibles</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $stats['offres_disponibles'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fonctionnalités -->
            <div class="mb-12 animate-fade-in" style="animation-delay: 0.4s">
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">
                    Découvrez vos avantages exclusifs
                </h2>

                <div class="grid md:grid-cols-3 gap-6">
                    @foreach($features as $feature)
                    <div class="feature-card bg-white rounded-xl shadow-lg p-6 text-center">
                        <div class="bg-{{ $feature['color'] }}-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="{{ $feature['icon'] }} text-{{ $feature['color'] }}-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $feature['title'] }}</h3>
                        <p class="text-gray-600">{{ $feature['description'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center animate-fade-in" style="animation-delay: 0.6s">
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl p-8 text-white">
                    <h2 class="text-3xl font-bold mb-4">Prêt à commencer ?</h2>
                    <p class="text-xl mb-6 opacity-90">
                        Explorez toutes les fonctionnalités qui vous attendent
                    </p>
                    <div class="flex justify-center space-x-4">
                        {{-- <a href="{{ route('dashboard') }}" --}}
                           {{-- class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors inline-flex items-center">
                            <i class="fas fa-rocket mr-2"></i>
                            Explorer le tableau de bord
                        </a> --}}
                        <a href="#"
                           class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition-colors inline-flex items-center">
                            <i class="fas fa-question-circle mr-2"></i>
                            Visite guidée
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-gray-500">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.</p>
                <p class="text-sm mt-2">
                    <a href="#" class="hover:text-indigo-600 transition-colors">Conditions d'utilisation</a>
                    <span class="mx-2">•</span>
                    <a href="#" class="hover:text-indigo-600 transition-colors">Politique de confidentialité</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Script pour animation de confettis (optionnel) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation simple de bienvenue
            console.log('Bienvenue à notre nouvel utilisateur !');

            // Vous pouvez ajouter ici des animations supplémentaires
            setTimeout(() => {
                const mainContent = document.querySelector('main');
                mainContent.classList.add('opacity-100');
            }, 100);
        });
    </script>

</body>
</html>
