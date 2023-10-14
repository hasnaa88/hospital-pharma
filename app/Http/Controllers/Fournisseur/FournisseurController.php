<?php

namespace App\Http\Controllers\Fournisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Fournisseur;
use App\Models\Pharmacien;
use Illuminate\Support\Facades\Auth;

class FournisseurController extends Controller
{

    //la fonction create : pour la creation de nouveau fournisseurs
    function create(Request $request){
        //validation des champs
          $request->validate([
             'name'=>'required',
             'email'=>'required|email|unique:fournisseurs,email',
            
             'password'=>'required|min:5|max:30',
             'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $fournisseur = new Fournisseur();
          $fournisseur->name = $request->name;
          $fournisseur->email = $request->email;
          $fournisseur->dateNaissance = $request->dateNaissance;
          $fournisseur->telephone = $request->telephone;
          $fournisseur->adresse = $request->adresse;
          $fournisseur->password = \Hash::make($request->password);
          $save = $fournisseur->save();

          if( $save ){
              return redirect()->back()->with('success','You are now registered successfully as fournisseur');
          }else{
              return redirect()->back()->with('fail','Something went Wrong, failed to register');
          }
    }

    function check(Request $request){
              //validation des champs
        $request->validate([
           'email'=>'required|email|exists:fournisseurs,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists in fournisseurs table'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('fournisseur')->attempt($creds) ){
            return redirect()->route('fournisseur.home');
        }else{
            return redirect()->route('fournisseur.login')->with('fail','Incorrect Credentials');
        }
    }
// déconnexion
    function logout(){
        Auth::guard('fournisseur')->logout();
        return redirect('/');
    }

//fonction listPharmacien() sert a lister tous les pharmacien
    public function listPharmacien(Request $request)
    {
      $pharmacien = Pharmacien::all();
      return view('/listPharmacien',compact('pharmacien'));
    }


}
