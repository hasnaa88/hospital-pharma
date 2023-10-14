<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use App\Models\Pharmacien;
use App\Models\StockMedicament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StockMedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sumQuantite = DB::table('stock_medicaments')
        ->sum('quantite');
    
      $quantiteMed=DB::select('SELECT nomMedicament,forme,SUM(quantite) as qt FROM `medicaments`,`stock_medicaments` 
      WHERE medicaments.id= stock_medicaments.medicament_id
      
      GROUP BY nomMedicament,forme');
        $medicaments = Medicament::all();
        $pharmaciens = Pharmacien::all();
      
     
     
        $stock = StockMedicament::paginate(3);
     
        return view('stock.index',compact('stock','sumQuantite','medicaments','pharmaciens','quantiteMed'));

       
          
           
    }
    public function NbChaqueMed()
{
    $quantiteMed=DB::select('SELECT nomMedicament,forme,SUM(quantite) as qt FROM `medicaments`,`stock_medicaments` 
    WHERE medicaments.id= stock_medicaments.medicament_id
    
    GROUP BY nomMedicament,forme');
    return view('stock.NbChaqueMed',compact('quantiteMed'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Medicament::all();
        $data2 = Pharmacien::all();
        return view('stock.create',['data'=>$data],['data2'=>$data2]);
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
            'dateEntre' => 'required',
            'medicament_id' => 'required',
            'pharmacien_id' => 'required',
            'quantite' => 'required',
        ]);
    
        StockMedicament::create($request->all());
     
        return redirect()->route('stock.index')
                        ->with('success','stock created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StockMedicament  $stockMedicament
     * @return \Illuminate\Http\Response
     */
    public function show(StockMedicament $stock)

    {
        $data = Medicament::all();
        $data2 = Pharmacien::all();
        return view('stock.show',compact('stock','data','data2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StockMedicament  $stockMedicament
     * @return \Illuminate\Http\Response
     */
    public function edit(StockMedicament $stock)

    {
        $data = Medicament::all();
        $data2 = Pharmacien::all();
        return view('stock.edit',compact('stock','data','data2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StockMedicament  $stockMedicament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockMedicament $stock)
    {
        $request->validate([
            
            ]);
        
            $stock->update($request->all());
        
            return redirect()->route('stock.index')
                            ->with('success','stock updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StockMedicament  $stockMedicament
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockMedicament $stock)
    {
        $stock->delete();
    
        return redirect()->route('stock.index')
                        ->with('success','stock deleted successfully');
    }

    
    public function search(Request $request)
    {
        if($request->isMethod('post')){
        $name=$request->get('name');
        $stock=StockMedicament::where('id','LIKE' ,'%' .$name .'%')->paginate(5);
    
        }
        return view('stock.index',compact('stock'));
    }



   

    
}
