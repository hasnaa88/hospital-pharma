@extends('commande.layout')
@section('title')
Info sur le commande
@endsection
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('commande.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
    <div class="row">
        <div class="mx-auto mb-5  p-2 text-success">
           
                <h2> Information sur le commande</h2>
      
        
        </div>
    </div>



    <div class="table table-bordered bg-white p-3 w-50 mx-auto">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Id de commande : </strong>
                {{ $commande->id }}
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group ">
                <strong>Date de commande : </strong>
                {{ $commande->dateCommande }}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong> Nom de pharmacien : </strong>
                <td>  <span class="name">
                    @foreach ($pharma as $phar)
                    @if($commande->pharmacien_id===$phar->id)
                 {{$phar->name}}
                    @endif
                @endforeach 
                    </span> </td>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong> Nom de fournisseur : </strong>
                <td>  <span class="name">
                    @foreach ($fournisseurs as $fournisseur)
                    @if($commande->fournisseur_id===$fournisseur->id)
                    {{$fournisseur->name}}
                    @endif
                @endforeach 
                    </span> </td>
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong> Nom de medicament : </strong>
  
                @foreach ($ligneCommande as $ligne)
                @foreach ($medicaments as $med)
      
                @if($commande->id===$ligne->commande_id)

                    @if($med->id===$ligne->medicament_id)
                  
                    {{ $med->nomMedicament }} {{ $med->forme }} {{ $med->dosage }} mg 
              
                   
                    @endif
                @endif
        
                @endforeach
                @endforeach
            </div>
        </div>
<!----------------------------------------------------->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group ">
        <strong> Quantité commandé: </strong>
        <td>  <span class="name">
                @foreach ($ligneCommande as $ligne)
                @if($commande->id===$ligne->commande_id)
                {{ $ligne->quantiteCommande }}  
                @endif

           @endforeach
        </span> </td>
    </div>
</div>
           <!------------------------------------------->
            

       


    </div>
    </div>
@endsection