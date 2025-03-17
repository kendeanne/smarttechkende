<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMARTTECH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
    <style>
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
    <div class="col s12">
    <h1>Les clients - SMARTTECH</h1>
    <hr>
    <a href= "/ajouterClient" class= "btn btn-primary">Ajouter un client  </a>
<hr>
@if (session('status'))
      <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>username</th>
                <th>password</th>
                <th>email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{$client->id}}</td>
                <td>{{$client->nom}}</td>
                <td>{{$client->prenom}}</td>
                <td>{{$client->username}}</td>
                <td>{{$client->password}}</td>
                <td>{{$client->email}}</td>
                <td>
                    <a href="/UpdateClient/{{$client->id}}" class="btn btn-info">Modifier</a>
                    <a href="/DeleteClient/{{$client->id}}" class="btn btn-danger">Supprimer</a>
	       	<a href="#" class="btn btn-warning">Rédiger un email</a>               
		 </td>
            </tr>
            @endforeach
         
         
        </tbody>
    </table>
    {{$clients->links()}}
    </div>
   
  </div>
</div>
<div class="logout-btn">
        <a class="btn btn-danger" href="{{ route('user.logout') }}">Logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


