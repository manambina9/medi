<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-100 to-blue-50 min-h-screen">
    <div class="min-h-screen flex items-center justify-center p-4">
        <!-- Card principale -->
        <div class="max-w-md w-full bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- En-tête stylisé -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-6">
                <div class="text-center">
                    <div class="inline-block p-4 rounded-full bg-white/10 mb-4">
                        <i class="fas fa-user-circle text-white text-4xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-white">Bienvenue | SMUR Pontoise
                    </h2>
                    <p class="text-blue-100 mt-2">Connectez-vous à votre compte</p>
                </div>
            </div>

            <!-- Formulaire -->
            <div class="p-8">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Champ Email -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               placeholder="Votre email"
                               class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 text-sm transition-all duration-200"
                               required 
                               autofocus>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Champ Mot de passe -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               placeholder="Votre mot de passe"
                               class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 text-sm transition-all duration-200"
                               required>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Case à cocher Se souvenir de moi -->
                    <div class="flex items-center">
                        <input type="checkbox" 
                               id="remember" 
                               name="remember" 
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            Se souvenir de moi
                        </label>
                    </div>

                    <!-- Bouton de connexion -->
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 px-4 rounded-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition-all duration-200 hover:scale-[1.02] flex items-center justify-center">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Se connecter
                    </button>

                    <!-- Liens -->
                    <div class="mt-6 text-center">
                        <a href="" 
                           class="text-sm text-blue-600 hover:text-blue-800 hover:underline flex items-center justify-center">
                            <i class="fas fa-key mr-1"></i>
                            Mot de passe oublié ?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Notifications -->
    @if (session('status'))
        <div class="fixed bottom-4 right-4 bg-white rounded-lg shadow-lg border-l-4 border-green-500 p-4 max-w-md animate-fade-in-up" role="alert">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle text-green-500 text-xl"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-gray-700">{{ session('status') }}</p>
                </div>
                <div class="ml-auto pl-3">
                    <button class="text-gray-400 hover:text-gray-500 focus:outline-none">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(1rem);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-up {
            animation: fade-in-up 0.3s ease-out;
        }
    </style>
</body>
</html>