<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | SMARTTECH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Fond avec un léger dégradé */
        body {
            background: linear-gradient(to right, #ff9966, #ff5e62);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        /* Conteneur du formulaire */
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }


        /* Titre */
        .login-header {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #ff5e62;
        }


        /* Champs de saisie */
        .form-control {
            height: 50px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 16px;
        }


        /* Icônes dans les champs */
        .input-group-text {
            background-color: #ff5e62;
            color: white;
            border-radius: 8px 0px 0px 8px;
        }


        /* Bouton de connexion */
        .btn-login {
            background-color: #ff5e62;
            border: none;
            height: 50px;
            font-size: 18px;
            border-radius: 8px;
            transition: 0.3s;
        }


        .btn-login:hover {
            background-color: #d14a50;
        }


        /* Message d'erreur */
        .alert-danger {
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>


<div class="login-container">
    <div class="login-header">Bienvenue chez SMARTTECH</div>
   
    <!-- Message d'erreur -->
    @if(session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


    <form action="{{ route('login.check') }}" method="POST">
        @csrf


        <!-- Champ Username -->
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required>
            </div>
        </div>


        <!-- Champ Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
            </div>
        </div>


        <!-- Sélection du rôle -->
        <div class="mb-3">
            <label class="form-label">Je suis :</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="role" value="admin" id="admin" required>
                <label class="form-check-label" for="admin">Admin</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="role" value="employe" id="employe" required>
                <label class="form-check-label" for="employe">Employé</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="role" value="client" id="client" required>
                <label class="form-check-label" for="client">Client</label>
            </div>
        </div>


        <!-- Bouton Login -->
        <div class="d-grid">
            <button type="submit" class="btn btn-login text-white">Se connecter</button>
        </div>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




