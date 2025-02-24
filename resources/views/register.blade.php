<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">Créer un compte</h2>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

         <!-- Affichage des erreurs -->
         @if ($errors->any())
            <div class="bg-red-500 text-white p-4 mb-4 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium">Nom</label>
                    <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium">Prénom</label>
                    <input type="text" name="firstname" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Email professionnel</label>
                <input type="email" name="mailpro" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Téléphone</label>
                <input type="text" name="telephone" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium">Fonction</label>
                    <select name="fonction" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="Amb">Amb</option>
                        <option value="SMUR">SMUR</option>
                        <option value="Inf SMUR">Inf SMUR</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium">Métier</label>
                    <select name="metier" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="ADE">ADE</option>
                        <option value="IDE">IDE</option>
                        <option value="IADE">IADE</option>
                        <option value="IPDE">IPDE</option>
                        <option value="Cadre">Cadre</option>
                        <option value="Medecin">Médecin</option>
                        <option value="ARM">ARM</option>
                        <option value="Interne">Interne</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Bureau</label>
                <select name="bureau" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="ParamedSMUR">ParamedSMUR</option>
                    <option value="Med SMUR">Med SMUR</option>
                    <option value="SAMU">SAMU</option>
                    <option value="Cadre">Cadre</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Rôle</label>
                <select name="role" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium">Mot de passe</label>
                    <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                S'inscrire
            </button>
        </form>

        <p class="mt-4 text-center text-gray-600">
            Vous avez déjà un compte ? <a href="{{ route('login') }}" class="text-blue-500 font-medium">Se connecter</a>
        </p>
    </div>

</body>
</html>
