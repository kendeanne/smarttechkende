<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMARTTECH</title>
    <!-- Inclusion de Bootstrap via CDN -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.logout-btn {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }


</style>

</head>
<body>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h1 class="display-4">Bienvenue sur la plateforme SMARTTECH</h1>
            <p class="lead">Nous sommes heureux de vous avoir parmi nous, Client!</p>
           
            <!-- Formulaire avec bouton pour récupérer des fichiers via FTP -->
            <form action="{{ route('ftp.list')}}" method="get">
                <button type="submit" class="btn btn-primary btn-lg">Télécharger ou Uploader des fichiers dans le serveur FTP</button>
            </form>
        </div>
    </div>
</div>
<div class="logout-btn">
        <a class="btn btn-danger" href="{{ route('user.logout') }}">Logout</a>
    </div>


<!-- Inclusion de Bootstrap JS (facultatif pour ce cas précis) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>




