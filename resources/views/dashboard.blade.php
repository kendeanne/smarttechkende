<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMARTTECH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #87CEFA, #E0FFFF);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        .center-links {
            display: flex;
            justify-content: center;
            gap: 20px; /* Espace entre les boutons */
            margin-top: 20px; /* Espace avec le texte au-dessus */
        }


        .center-links a {
            font-size: 1.5rem; /* Augmente la taille du texte */
            padding: 15px 30px; /* Augmente la taille du bouton */
            min-width: 200px; /* Largeur minimale pour uniformiser */
            text-align: center;
        }


        .logout-btn {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h1>SMARTTECH</h1>
                <h2>Bienvenue dans ton menu de gestion</h2>
                <h3>Choisissez pour continuer</h3>


                <div class="center-links">
                    <a href="/employe" class="btn btn-info">Employés</a>
                    <a href="client" class="btn btn-info">Clients</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bouton Logout en bas à droite -->
    <div class="logout-btn">
        <a class="btn btn-danger" href="{{ route('user.logout') }}">Logout</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




