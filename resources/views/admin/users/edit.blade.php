@extends('admin.baseadmin')

@section('titre', 'Modifier user')

@section('content')
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 40px auto;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #555;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus {
            border-color: #007bff;
            outline: none;
            background-color: #fff;
        }

        select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
        }

        select:focus {
            border-color: #007bff;
            outline: none;
            background-color: #fff;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        button[type="submit"]:active {
            background-color: #004085;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .back-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
</style>


<div class="container">
    <h1>Modifier l'utilisateur</h1>

    <form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <!-- Champs existants (nom, email, etc.) -->
    
    <div class="form-group">
        <label for="numero">Numéro (à partir de 1001)</label>
        <input type="number" name="numero" id="numero" class="form-control" value="{{ old('numero', 1001) }}">
    </div>
    <div class="form-group">
        <label for="firstname">Nom</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname" class="form-control" value="{{ old('firstname') }}">
    </div>

    <div class="form-group">
        <label for="mailpro">Email professionnel</label>
        <input type="email" name="mailpro" id="mailpro" class="form-control" value="{{ old('mailpro') }}">
    </div>

    <div class="form-group">
        <label for="telephone">Téléphone</label>
        <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone') }}">
    </div>

    <div class="form-group">
        <label for="fonction">Fonction</label>
        <select name="fonction" id="fonction" class="form-control">
            <option value="Amb" {{ old('fonction') == 'Amb' ? 'selected' : '' }}>Amb</option>
            <option value="SMUR" {{ old('fonction') == 'SMUR' ? 'selected' : '' }}>SMUR</option>
            <option value="Inf SMUR" {{ old('fonction') == 'Inf SMUR' ? 'selected' : '' }}>Inf SMUR</option>
        </select>
    </div>

    <div class="form-group">
        <label for="metier">Métier</label>
        <select name="metier" id="metier" class="form-control">
            <option value="ADE" {{ old('metier') == 'ADE' ? 'selected' : '' }}>ADE</option>
            <option value="IDE" {{ old('metier') == 'IDE' ? 'selected' : '' }}>IDE</option>
            <option value="IADE" {{ old('metier') == 'IADE' ? 'selected' : '' }}>IADE</option>
            <option value="IPDE" {{ old('metier') == 'IPDE' ? 'selected' : '' }}>IPDE</option>
            <option value="Cadre" {{ old('metier') == 'Cadre' ? 'selected' : '' }}>Cadre</option>
            <option value="Medecin" {{ old('metier') == 'Medecin' ? 'selected' : '' }}>Médecin</option>
            <option value="ARM" {{ old('metier') == 'ARM' ? 'selected' : '' }}>ARM</option>
            <option value="interne" {{ old('metier') == 'interne' ? 'selected' : '' }}>Interne</option>
        </select>
    </div>

    <div class="form-group">
        <label for="bureau">Bureau</label>
        <select name="bureau" id="bureau" class="form-control">
            <option value="ParamedSMUR" {{ old('bureau') == 'ParamedSMUR' ? 'selected' : '' }}>ParamedSMUR</option>
            <option value="Med SMUR" {{ old('bureau') == 'Med SMUR' ? 'selected' : '' }}>Med SMUR</option>
            <option value="SAMU" {{ old('bureau') == 'SAMU' ? 'selected' : '' }}>SAMU</option>
            <option value="Cadre" {{ old('bureau') == 'Cadre' ? 'selected' : '' }}>Cadre</option>
        </select>
    </div>

    <div class="form-group">
        <label for="last_login">Dernière connexion</label>
        <input type="datetime-local" name="last_login" id="last_login" class="form-control" value="{{ old('last_login') }}">
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>


    <div class="back-link">
        <a href="{{ route('admin.users.index') }}">Retour à la liste des utilisateurs</a>
    </div>
</div>

@endsection