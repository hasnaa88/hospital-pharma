<?php

namespace App\Http\Controllers\Pharmacien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Pharmacien;
use App\Models\StockMedicament;
use Illuminate\Support\Facades\Auth;

class PharmacienController extends Controller
{
    function create(Request $request){
          //Validate inputs
          $request->validate([
             'name'=>'required',
             'email'=>'required|email|unique:pharmaciens,email',
            
             'password'=>'required|min:5|max:30',
             'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $pharmacien = new Pharmacien();
          $pharmacien->name = $request->name;
          $pharmacien->email = $request->email;
          $pharmacien->dateNaissance = $request->dateNaissance;
          $pharmacien->telephone = $request->telephone;
          $pharmacien->adresse = $request->adresse;
          $pharmacien->password = \Hash::make($request->password);
          $save = $pharmacien->save();

          if( $save ){
              return redirect()->back()->with('success','Vous êtes maintenant inscrit avec succès comme pharmacien');
          }else{
              return redirect()->back()->with('fail','Something went Wrong, failed to register');
          }
    }

    function edit(){

        return view('pharmacien.edit-profile');


    }

    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:pharmaciens,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists in pharmaciens table'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('pharmacien')->attempt($creds) ){
            return redirect()->route('pharmacien.home');
        }else{
            return redirect()->route('pharmacien.login')->with('fail','Email ou mot de passe est incorrect');
        }
    }

    function logout(){
        Auth::guard('pharmacien')->logout();
        return redirect('pharmacien.login');
    }




}
