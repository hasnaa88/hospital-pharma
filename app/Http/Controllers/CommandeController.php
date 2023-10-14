<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Fournisseur;
use App\Models\LigneCommande;
use App\Models\Medicament;
use App\Models\Pharmacien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 
    public function index()
    {
        $commande = Commande::paginate(3); // afficher 3 commandes dans une page
        $pharma = Pharmacien::all(); // afficher tous les pharmacien 
        $fournisseurs = Fournisseur::all(); // afficher tous les pharmaciens fournisseurs

        return view('commande.index',compact('commande','pharma','fournisseurs'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $pharma = Pharmacien::all(); // afficher tous les pharmacien 
        $fourni = Fournisseur::all(); // afficher tous les pharmaciens fournisseurs

        return view('commande.create',compact('pharma','fourni'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        //validation des champs
        $request->validate([
            'dateCommande' => 'required',
            'pharmacien_id' => 'required',
            'fournisseur_id' => 'required',
            'valide'
        ]);
    
        Commande::create($request->all());
        return redirect()->route('commande.index')->with('success','commande created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */

    public function show(Commande $commande)
    {
        $comMed=DB::select("SELECT * FROM commandes INNER JOIN ligne_commandes  ON commandes.id=ligne_commandes.commande_id and dateCommande='2021-07-10'");
        $pharma = Pharmacien::all();
        $fournisseurs = Fournisseur::all();
        $ligneCommande=LigneCommande::all();
        $medicaments=Medicament::all();

        return view('commande.show',compact('comMed','commande','ligneCommande', 'medicaments','pharma','fournisseurs'));



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        $pharmaciens = Pharmacien::all();
        $fournisseurs = Fournisseur::all();

        return view('commande.edit',compact('commande','pharmaciens','fournisseurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Commande $commande)
    {
        $request->validate([
            
        ]);
        $commande->update($request->all());
        return redirect()->route('commande.index')->with('success','commande updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        $commande->delete();
    
        return redirect()->route('commande.index')
                        ->with('success','commande deleted successfully');
    }


    public function search(Request $request)
    {
        if($request->isMethod('post')){
        $name=$request->get('name');
        $commande=Commande::where('nomcommande','LIKE' ,'%' .$name .'%')->paginate(5);
        }
        return view('commande.index',compact('commande'));
    }

   


    public function listCom(Request $request)
  {
    $commande = Commande::all();
    $pharma = Pharmacien::all();
    $fournisseurs = Fournisseur::all();
    $medicaments=Medicament::all();
    $ligneCommandes=LigneCommande::all();

    return view('commande.listCom',compact('commande','pharma','fournisseurs','ligneCommandes','medicaments'));
  }


  

  public function listComFournisseur(Request $request)
  {
    $ligneCommande=LigneCommande::all();
    $commandes  = DB::select('select * from commandes');
    $pharmaciens = DB::select('select * from pharmaciens ');
    $fournisseurs = DB::select('select * from fournisseurs ');  
    $medicaments=Medicament::all();

    return view('commande.listComFournisseur',compact('medicaments','ligneCommande','commandes','pharmaciens','fournisseurs'));
  }
 

}
