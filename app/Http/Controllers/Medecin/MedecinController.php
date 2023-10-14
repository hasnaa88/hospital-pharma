<?php

namespace App\Http\Controllers\Medecin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Medecin;
use Illuminate\Support\Facades\Auth;

class MedecinController extends Controller
{
      //la fonction create : pour la creation de nouveau medecin
    function create(Request $request){
              //validation des champs
          $request->validate([
             'name'=>'required',
             'email'=>'required|email|unique:medecins,email',
             'departement'=>'required',
             'password'=>'required|min:5|max:30',
             'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $medecin = new Medecin();
          $medecin->name = $request->name;
          $medecin->email = $request->email;
          $medecin->departement = $request->departement;

          $medecin->dateNaissance = $request->dateNaissance;
          $medecin->telephone = $request->telephone;
          $medecin->adresse = $request->adresse;
        
          $medecin->password = \Hash::make($request->password);
          $save = $medecin->save();

          if( $save ){
              return redirect()->back()->with('success','You are now registered successfully as medecin');
          }else{
              return redirect()->back()->with('fail','Something went Wrong, failed to register');
          }
    }




    

    // la fonction check sert a verifier les informations
    function check(Request $request){
            //validation des champs
        $request->validate([
           'email'=>'required|email|exists:medecins,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists in doctors table'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('medecin')->attempt($creds) ){
            return redirect()->route('medecin.home');
        }else{
            return redirect()->route('medecin.login')->with('fail','Incorrect Credentials');
        }
    }

    



//déconnexion
    function logout(){
        Auth::guard('medecin')->logout();
        return redirect('/');
    }
    
   
}
