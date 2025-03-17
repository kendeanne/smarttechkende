<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Employe;
use Illuminate\Support\Facades\Mail;

class EmployeController extends Controller
{
    public function listeEmploye(){
        $employes = Employe::paginate(5);
        return view('employe.liste', compact('employes'));
    }


    public function ajouterEmploye(){
        return view('employe.ajouter');
    }
    public function ajouterEmploye_traitement(Request $request){


        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);
        $employe = new Employe();
        $employe->nom = $request->nom;
        $employe->prenom = $request->prenom;
        $employe->username = $request->username;
        $employe->password = $request->password;
        $employe->email = $request->email;
   $employe->save();
   return redirect('/ajouterEmploye')->with('status', 'nouvel employé ajouté avec succès');
    }


    public function update_employe($id){
        $employes = Employe::find($id);
        return view('employe.update', compact('employes'));
    }


    public function UpdateEmploye_traitement(Request $request){


        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);
        $employe = Employe::find($request-> id);
        $employe->nom = $request->nom;
        $employe->prenom = $request->prenom;
        $employe->username = $request->username;
        $employe->password = $request->password;
        $employe->email = $request->email;
   $employe->update();
   return redirect('/employe')->with('status', 'employé modifié avec succès');
    }


    public function delete_employe($id){


         $employe = Employe::find($id);
         $employe -> delete();
         return redirect('/employe')->with('status', 'employé supprimé avec succès');


    }


	public function envoyerEmail(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string'
    ]);


    $emailData = [
        'to' => $request->email, // Utilisation de l'email saisi par l'utilisateur
        'subject' => $request->subject,
        'message' => $request->message
    ];


    // Vérifiez que le message est une chaîne de caractères
    if (!is_string($emailData['message'])) {
        return back()->with('error', 'Le message doit être une chaîne de caractères.');
    }


    Mail::send([], [], function ($message) use ($emailData) {
        $message->to($emailData['to'])
                ->subject($emailData['subject'])
                ->setBody($emailData['message'], 'text/html'); // Assurez-vous que $emailData['message'] est du texte HTML
    });


    return back()->with('success', 'Email envoyé avec succès !');
}






	public function redigerEmail($id)
{
    $employe = Employe::find($id);
  // Récupère l'employé par son ID
   
    return view('employe.redigerEmail', compact('employe'));  // Retourne la vue avec les informations de l'employé
}


}





