<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Client;


class ClientController extends Controller
{
    public function listeClient(){
        $clients = Client::paginate(5);
        return view('client.liste', compact('clients'));
    }


    public function ajouterClient(){
        return view('client.ajouter');
    }
    public function ajouterClient_traitement(Request $request){


        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);
        $client = new Client();
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->username = $request->username;
        $client->password = $request->password;
        $client->email = $request->email;
   $client->save();
   return redirect('/ajouterClient')->with('status', 'nouveau client ajouté avec succès');
    }


    public function update_client($id){
        $clients = Client::find($id);
        return view('client.update', compact('clients'));
    }


    public function UpdateClient_traitement(Request $request){


        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);
        $client = Client::find($request-> id);
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->username = $request->username;
        $client->password = $request->password;
        $client->email = $request->email;
   $client->update();
   return redirect('/client')->with('status', 'client modifié avec succès');
    }
    public function delete_client($id){


        $client = Client::find($id);
        $client -> delete();
        return redirect('/client')->with('status', 'employé supprimé avec succès');


   }
}





