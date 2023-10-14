<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 
    public function index()
    {
        $medicament = Medicament::paginate(3);
    
        return view('medicament.index',compact('medicament'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicament.create');
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
            'nomMedicament' => 'required',
            'prixMedicament' => 'required',
            'dosage' => 'required',
            'dateProduction' => 'required',
            'datePeremption' => 'required',
            'forme'=> 'required',
        ]);
    
        Medicament::create($request->all());


        return redirect()->route('medicament.index')
                        ->with('success','Le medicament a été créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */


    public function show(Medicament $medicament)
    {
        return view('medicament.show',compact('medicament'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */


    public function edit(Medicament $medicament)
    {
        return view('medicament.edit',compact('medicament'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Medicament $medicament)
    {
        $request->validate([
            
        ]);
    
        $medicament->update($request->all());
    
        return redirect()->route('medicament.index')
                        ->with('success','medicament a été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */

    public function destroy(Medicament $medicament)
    {
        $medicament->delete();
    
        return redirect()->route('medicament.index')
                        ->with('success','Le medicament a été supprimer avec succès');
    }


    public function search(Request $request)
    {
        if($request->isMethod('post')){
        $name=$request->get('name');
        $medicament=Medicament::where('nomMedicament','LIKE' ,'%' .$name .'%')->paginate(5);
        


        }
        return view('medicament.index',compact('medicament'));
    }

  


public function listMed(Request $request)
  {
    $medicament = Medicament::all();
    return view('medicament.listMed',compact('medicament'));
  }

  
  public function searchListMed(Request $request)
    {
        if($request->isMethod('post')){
        $name=$request->get('name');

        $medicament=Medicament::where('nomMedicament','LIKE' ,'%' .$name .'%' )->paginate(5);
        }
        return view('medicament.listMed',compact('medicament'));
    }

    

}
