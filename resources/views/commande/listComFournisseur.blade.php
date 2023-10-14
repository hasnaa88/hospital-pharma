@extends('commande.layoutFour')

@section('content')


<div class="row">
  <div class="mx-auto mb-5  p-2 text-success">
     
          <h2>Liste des commandes</h2>

  
  </div>
</div>

<!-------------------------------------------->
<div class="orders">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <h4 class="box-title">liste des commandes  </h4>
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table ">
                <thead>
                  <tr>
                    <th class="serial">id</th>
                    <th class="serial">date de commande </th>
                 
                    <th class="serial">nom de  pharmacien</th>
                   
                    <th class="serial">nom de fournisseur </th>
                    <th class="serial">   Nom de medicament commandé </th>
                    <th class="serial">   Quantité commandé </th>
                   
                    <th class="serial">validé</th>
                    
                    <th class="serial">valider les commandes</th>
                  </tr>
                </thead>
                <tbody>
                  
                 

                  @foreach ($commandes  as $commande)
                  @if (Auth::guard('fournisseur')->user()->id ==$commande->fournisseur_id)
                    <tr>
                   
         


                      <td>  <span class="name">{{$commande->id}}</span> </td>
                      <td>  <span class="name">{{$commande->dateCommande }}</span> </td>
                     
                      <td>  <span class="name">  
                        @foreach ($pharmaciens  as $pharmacien)
                        @if($commande->pharmacien_id===$pharmacien->id)
                        {{$pharmacien->name}}
                        @endif
                    @endforeach 

           
                          </span> </td>
                      
                      
                     
                     
                    
                      <td>  <span class="name">
                        @foreach ($fournisseurs as $fournisseur)
                        @if($commande->fournisseur_id===$fournisseur->id)
                        {{$fournisseur->name}}
                        @endif
                    @endforeach 
                        </span> </td>
                      

                        <td>  <span class="name">
                          @foreach ($ligneCommande as $ligne)
                          @foreach ($medicaments as $med)
                
                          @if($commande->id===$ligne->commande_id)
          
                              @if($med->id===$ligne->medicament_id)
                            
                              {{ $med->nomMedicament }} {{ $med->forme }} {{ $med->dosage }} mg 
                        
                             
                              @endif
                          @endif
                  
                          @endforeach
                          @endforeach
                          </span> </td>



                          <td>  <span class="name">
                            @foreach ($ligneCommande as $ligne)
                            @if($commande->id===$ligne->commande_id)
                            {{ $ligne->quantiteCommande }}  
                            @endif
            
                       @endforeach
                            </span> </td>
  
                    


                        <td> 
                            @if ($commande->valide === 0) <span class="name" style="background-color: red ;padding:5px ;color:white">  non</span>    
                           @else
                     
                            <span class="name" style="background-color: green ;padding:5px; color:white"> oui</span> 
                          
                             @endif
                            </td>
               <!----------------------------------------------------------------------------------------->
                            
               <td> 
            
                <input type="checkbox" name="valide" value="{{DB::update('update commandes set valide=1')}}">  oui
          
              

               
              </td>



                         
                    </tr>
                  @endif

                  @endforeach

                </tbody>
             
              </table>
            </div> 
          </div>
        </div> 
      </div>  <!-- /.col-lg-8 -->


    </div>
  </div>
  <!-- /.orders -->
 
  @endsection