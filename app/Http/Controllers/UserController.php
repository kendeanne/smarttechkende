<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function index2()
    {
        return view('dashboard');
    }
    public function index3()
    {
        return view('employe.espaceemploye');
    }
    public function index4()
    {
        return view('client.espaceclient');
    }


    public function check(Request $request)
    {
        $user = $request->username;
        $pass = $request->password;
        $role = $request->role; // Récupérer le rôle sélectionné (admin, employé, client)
	$guard = 'web';
	$userRecord =null;
	$dashboardRoute= 'student.login';

        // Vérification selon le rôle sélectionné
        if ($role === 'admin') {
            $userRecord = DB::table('users')->where('name', $user)->first();
            $dashboardRoute = 'dashboard';
        } elseif ($role === 'employe') {
            $userRecord = DB::table('employes')->where('username', $user)->first();
            $dashboardRoute = 'espaceemploye';
        } elseif ($role === 'client') {
            $userRecord = DB::table('clients')->where('username', $user)->first();
            $dashboardRoute = 'espaceclient';
        } else {
            session()->flash('error', 'Veuillez sélectionner un rôle valide.');
            return redirect()->route('student.login');
        }

	if($userRecord) {
        // Vérifier si l'utilisateur existe et si le mot de passe est correct
       		 if ($role ==='admin' && Hash::check( $pass, $userRecord->password)) {
          //  Auth::guard($guard)->loginUsingId($userRecord->id);
            return redirect()->route($dashboardRoute);
        }


		if (($role === 'employe' || $role === 'client' ) && $userRecord->password === $pass){

			return redirect()->route($dashboardRoute);
		
}
}

 else {
            session()->flash('error', 'Identifiants incorrects ou utilisateur non trouvé.');
            return redirect()->route('student.login');
        }
 }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('student.login');
    }
}





