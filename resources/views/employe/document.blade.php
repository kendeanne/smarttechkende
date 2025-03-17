<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des fichiers FTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <h2 class="mb-4">📂 Gestion des fichiers FTP</h2>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


    <!-- Formulaire Upload avec barre de progression -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">📤 Uploader un fichier</h5>
            <form id="uploadForm" action="{{ route('ftp.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="file" name="file" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">🔼 Envoyer</button>
            </form>


            <!-- Barre de progression -->
            <div class="progress mt-3" style="display:none;">
                <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>


    <!-- Liste des fichiers -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nom du fichier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($files as $file)
                <tr>
                    <td>{{ basename($file) }}</td>
                    <td>
                        <a href="{{ route('ftp.download', ['filename' => basename($file)]) }}" class="btn btn-success btn-sm">
                            📥 Télécharger
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center">Aucun fichier trouvé sur le serveur FTP.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="logout-btn">
        <a class="btn btn-danger" href="{{ route('user.logout') }}">Logout</a>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('uploadForm').addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        let xhr = new XMLHttpRequest();


        xhr.open('POST', this.action, true);
        xhr.upload.onprogress = function(event) {
            if (event.lengthComputable) {
                let percent = (event.loaded / event.total) * 100;
                document.querySelector('.progress').style.display = 'block';
                document.getElementById('progressBar').style.width = percent + '%';
            }
        };
        xhr.onload = function() {
            if (xhr.status === 200) {
                location.reload();
            }
        };
        xhr.send(formData);
    });
</script>


</body>
</html>




