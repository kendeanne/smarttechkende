<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CLIENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
   


    <div class="container">
  <div class="row">
    <div class="col s12">
    <h1>Modifier un client</h1>
    <hr>
    @if (session('status'))
      <div class="alert alert-success">{{ session('status') }}</div>
    @endif
   
    <ul>
      @foreach($errors->all() as $error)
        <li class="alert alert-danger"> {{$error}}</li>
      @endforeach
    </ul>
<form  action="/UpdateClient/traitement" method="POST"    class= "form-group">
  @csrf


  <input type="text" name = 'id' style="display : none;" value = "{{ $clients -> id }}" >
  <div class="form-group">
   
    <label for="Nom">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom" value = "{{ $clients -> nom }}">
  </div>
  <div class="form-group">
    <label for="Prenom">Prenom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" value = "{{ $clients -> prenom }}">
  </div>
  <div class="form-group">
    <label for="Username">Username</label>
    <input type="text" class="form-control" id="username" name="username" value = "{{ $clients -> username }}">
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="text" class="form-control" id="password" name="password" value = "{{ $clients -> password }}">
  </div>
  <div class="form-group">
    <label for="Email1" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name = "email" aria-describedby="emailHelp" value = "{{ $clients -> email }}">
  </div>


  <br>
  <button type="submit" class="btn btn-primary">MODIFIER</button>
  <br> <br>
  <a href="/employe" class="btn btn-danger">Revenir à la liste des employés</a>
</form>
    </div>
   
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


