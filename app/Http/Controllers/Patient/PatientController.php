<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Ordonnance;
use Illuminate\Http\Request;

use App\Models\Patient;



use Facade\Ignition\Support\Packagist\Package;


class PatientController extends Controller
{
    public function index()
    {
        $patient = Patient::paginate(3);
       
        return view('patient.index',compact('patient'));
            
    }

    
    public function create()
    {
     
      
        return view('patient.create');
       
    }
    public function store(Request $request)
    {
      
        $request->validate([
           
            'name' => 'required' ,
             'email' => 'required' ,
             'dateNaissance' => 'required',
             'telephone' => 'required',
             'adresse' => 'required',
         
        ]);
   

    $patient = new Patient();
    $patient -> name=$request->name;

    $patient -> email=$request->email;
    $patient -> dateNaissance=$request->dateNaissance;
    $patient -> telephone=$request->telephone;
    $patient -> adresse=$request->adresse;
   
    $patient ->Save();
 

        return redirect()->route('patient.index')
                        ->with('success','le patient a été ajouté avec succès.');  
    }

   //fonction edit() est pour modifier les informations de patient 
   public function edit(Patient $patient)
    {

        return view('patient.edit',compact('patient'));
       
    }

    //fonction update() est pour faire la mise a jour des informations de patient 
 public function update(Request $request, Patient $patient)
    {
        $request->validate([
     
            ]);
        
            $patient->update($request->all());
        
            return redirect()->route('patient.index')
                            ->with('success','les information de patient a été modifié avec succès');
    }


    //fonction show() est pour afficher les information de patient 
    public function show(Patient $patient)
    {
     
        return view('patient.show',compact('patient'));
    }

//fonction destroy() est pour supprimer le patient
    public function destroy(Patient $patient)
    {
        
        $patient->delete();
    
        return redirect()->route('patient.index')
                        ->with('success','le patient a été supprimé avec succès');
    }

// la fonction listPatient() est pour lister les patients et leurs ordonnances
    public function listPatient(Request $request)
    {
   
        $patients = Patient::paginate(5);
      $ordonnances=Ordonnance::all();
   
      return view('patient.listPatient',compact('patients','ordonnances'));
    }

}
