salut
@extends('layouts.app')

@section('content')
<h2>Tableau de bord - Administration</h2>

{{-- Ajouter un employé --}}
<h3>Ajouter un employé</h3>
<form method="POST" action="{{ route('admin.addEmployee') }}">
    @csrf
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="prenom" placeholder="Prénom" required>
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Ajouter</button>
</form>

{{-- Liste des employés --}}
<h3>Liste des employés</h3>
<table border="1">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Username</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    @foreach($employees as $employee)
    <tr>
        <td>{{ $employee->nom }}</td>
        <td>{{ $employee->prenom }}</td>
        <td>{{ $employee->username }}</td>
        <td>{{ $employee->email }}</td>
        <td>
            <a href="{{ route('admin.editEmployee', $employee->id) }}">Modifier</a> |
            <form method="POST" action="{{ route('admin.deleteEmployee', $employee->id) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{-- Ajouter un client --}}
<h3>Ajouter un client</h3>
<form method="POST" action="{{ route('admin.addClient') }}">
    @csrf
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="prenom" placeholder="Prénom" required>
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Ajouter</button>
</form>

{{-- Liste des clients --}}
<h3>Liste des clients</h3>
<table border="1">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Username</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    @foreach($clients as $client)
    <tr>
        <td>{{ $client->nom }}</td>
        <td>{{ $client->prenom }}</td>
        <td>{{ $client->username }}</td>
        <td>{{ $client->email }}</td>
        <td>
            <a href="{{ route('admin.editClient', $client->id) }}">Modifier</a> |
            <form method="POST" action="{{ route('admin.deleteClient', $client->id) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection



