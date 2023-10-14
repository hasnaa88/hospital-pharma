<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Medicament;
use App\Models\LigneCommande;
use Illuminate\Http\Request;

class LigneCommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 
    public function index()
    {
        $ligneCommande = LigneCommande::paginate(3);
        $medicaments=Medicament::all();
    
        return view('ligneCommande.index',compact('ligneCommande','medicaments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Medicament::all();
        $data2 = Commande::all();
      
     return view('ligneCommande.create',['data'=>$data],['data2'=>$data2]);
        
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
            'commande_id'=> 'required',
            'medicament_id'=> 'required',
            'quantiteCommande'=> 'required',
        ]);
    
        LigneCommande::create($request->all());
     
        return redirect()->route('ligneCommande.index')->with('success','ligneCommande created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ligneCommande  $ligneCommande
     * @return \Illuminate\Http\Response
     */
    public function show(LigneCommande $ligneCommande)
    {
        $medicament = Medicament::all();
        $commande = Commande::all();
        return view('ligneCommande.show',compact('ligneCommande','medicament','commande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ligneCommande  $ligneCommande
     * @return \Illuminate\Http\Response
     */
    public function edit(LigneCommande $ligneCommande)
    {

        $data = Medicament::all();
        $data2 = Commande::all();
        return view('ligneCommande.edit',compact('ligneCommande','data','data2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LigneCommande $ligneCommande)
    {
        $request->validate([
            
        ]);
    
        $ligneCommande->update($request->all());
    
        return redirect()->route('ligneCommande.index')
                        ->with('success','ligneCommande updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(LigneCommande $ligneCommande)
    {
        $ligneCommande->delete();
    
        return redirect()->route('ligneCommande.index')
                        ->with('success','ligneCommande deleted successfully');
    }


    public function search(Request $request)
    {
        if($request->isMethod('post')){
        $name=$request->get('name');
        $ligneCommande=LigneCommande::where('nomcommande','LIKE' ,'%' .$name .'%')->paginate(5);
        }
        return view('ligneCommande.index',compact('ligneCommande'));
    }

   
}
