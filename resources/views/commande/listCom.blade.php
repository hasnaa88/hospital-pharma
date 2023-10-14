@extends('commande.layout')
 @section('title')
     Liste des commandes
 @endsection
@section('content')
<div class="pull-right">
  <a class="btn btn-primary" href="{{ route('commande.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>

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
                   
                    <th class="serial">validé</th>
                  </tr>
                </thead>
                <tbody>
                  
               

                  @foreach ($commande  as $com)
                    <tr>
                   
         


                      <td>  <span class="name">{{$com->id}}</span> </td>
                      <td>  <span class="name">{{$com->dateCommande }}</span> </td>
                     
                      <td>  <span class="name">  
                        @foreach ($pharma  as $pha)
                        @if($com->pharmacien_id===$pha->id)
                        {{$pha->name}}
                        @endif
                    @endforeach 

           
                          </span> </td>
                      
                      
                     
                     
                    
                      <td>  <span class="name">
                        @foreach ($fournisseurs as $fournisseur)
                        @if($com->fournisseur_id===$fournisseur->id)
                        {{$fournisseur->name}}
                        @endif
                    @endforeach 
                        </span> </td>
                      
                  
                        <td> 
                            @if ($com->valide === 0) <span class="name" style="background-color: red ;padding:5px ;color:white">  non</span>    
                           @else
                     
                            <span class="name" style="background-color: green ;padding:5px; color:white"> oui</span> 
                          
                             @endif
                            </td>
               
                    
                         
                    </tr>
                  
                  @endforeach


                </tbody>
             
              </table>
            </div> <!-- /.table-stats -->
          </div>
        </div> <!-- /.card -->
      </div>  <!-- /.col-lg-8 -->


    </div>
  </div>
  <!-- /.orders -->
 
  @endsection