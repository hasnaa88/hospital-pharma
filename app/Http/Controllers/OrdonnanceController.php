<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Ordonnance;
use App\Models\Medicament;
use App\Models\Patient;
use Illuminate\Http\Request;

class OrdonnanceController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordonnance = Ordonnance::paginate(3);
        $medicaments=Medicament::all();
    $patient=Patient::all();
        return view('ordonnance.index',compact('ordonnance','patient','medicaments'));
            
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Medicament::all();
        $patient=Patient::all();
        $medecin=Medecin::all();
      
        return view('ordonnance.create',compact('data','patient','medecin'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'dateOrdonnace' => 'required' ,
             'titreOrdonnace' => 'required' ,
             'description',
             'medicament_id' => 'required',
             'patient_id' => 'required',
             'medecin_id'=> 'required',
             'nombreFoisMedicament'  =>'required',
             'duree_usage' =>'required',
        ]);
   

    $ordonnance = new Ordonnance();
    $ordonnance -> titreOrdonnace=$request->titreOrdonnace;

    $ordonnance -> dateOrdonnace=$request->dateOrdonnace;
    $ordonnance -> medicament_id=$request->medicament_id;
    $ordonnance -> description=$request->description;
    $ordonnance -> patient_id=$request->patient_id;
    $ordonnance -> medecin_id=$request->medecin_id;

    $ordonnance -> nombreFoisMedicament=$request->nombreFoisMedicament;
    $ordonnance -> duree_usage=$request->duree_usage;
    $ordonnance ->Save();

        return redirect()->route('ordonnance.index')
                        ->with('success','ordonnance a été créé avec succès.');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ordonnance  $ordonnance
     * @return \Illuminate\Http\Response
     */
    public function show(Ordonnance $ordonnance)
    {
        $medicaments=Medicament::all();
        $patients=Patient::all();
        $medecins=Medecin::all();
        return view('ordonnance.show',compact('ordonnance','medicaments','patients','medecins'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ordonnance  $ordonnance
     * @return \Illuminate\Http\Response
     */
    public function edit(Ordonnance $ordonnance)
    {
        $data = Medicament::all();
        $patient=Patient::all();
        $medecin=Medecin::all();
      
        return view('ordonnance.edit',compact('ordonnance','data','patient','medecin'));
       
    }

    /**
     * Update the specified resource in storage.0.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ordonnance  $ordonnance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ordonnance $ordonnance)
    {
        $request->validate([
            
            ]);
        
            $ordonnance->update($request->all());
        
            return redirect()->route('ordonnance.index')
                            ->with('success','ordonnance a été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ordonnance  $ordonnance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ordonnance $ordonnance)
    {
        
        $ordonnance->delete();
    
        return redirect()->route('ordonnance.index')
                        ->with('success','ordonnance a été supprimé avec succès');
    }

    public function search(Request $request)
    {
        $medicaments=Medicament::all();
        $patients=Patient::all();
        $medecins=Medecin::all();
        if($request->isMethod('post')){
        $name=$request->get('name');
        $ordonnance=Ordonnance::where('id','LIKE' ,'%' .$name .'%')->paginate(5);
        


        }
        return view('ordonnance.listOrd',compact('ordonnance','medicaments','patients','medecins'));
    }

    public function searchOrdPharma(Request $request)
    {
        $medicaments=Medicament::all();
        $patients=Patient::all();
        $medecins=Medecin::all();
        if($request->isMethod('post')){
        $name=$request->get('name');
        $ordonnance=Ordonnance::where('id','LIKE' ,'%' .$name .'%')->paginate(5);
        


        }
        return view('ordonnance.listOrdPharma',compact('ordonnance','medicaments','patients','medecins'));
    }



    public function listOrd(Request $request)
  {
    $ordonnance = Ordonnance::paginate(3);
    $medicaments=Medicament::all();
    $patients=Patient::all();
    $medecins=Medecin::all();
    return view('ordonnance.listOrd',compact('ordonnance','medicaments','patients','medecins'));
  }

  public function listOrdPharma(Request $request)
  {
    $ordonnance = Ordonnance::all();
    $medicaments=Medicament::all();
    $patients=Patient::all();
    $medecins=Medecin::all();
    return view('ordonnance.listOrdPharma',compact('ordonnance','medicaments','patients','medecins'));
  }



}
