@extends('medicament.layout')
@section('title')
Info sur le medicament
@endsection
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('medicament.index') }}"> Back</a>
</div>
    <div class="row">
        <div class="mx-auto mb-5  p-2 text-success">
         
                <h2> Information sur le medicament</h2>
            
           
        </div>
    </div>

    <div class="table table-bordered bg-white p-3 w-50 mx-auto">
    <div class="row">
        
       
    
        <!----------------------------------------------------------->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nom de medicament</strong>
               
                @foreach ($medicament as $med)
        

                    @if($med->id===$ligneCommande->medicament_id)

                    {{ $med->nomMedicament }}  
                    @endif
                
                @endforeach
          
              
            </div>
        </div>

        <!----------------------------------------------------------->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>id de commande</strong>
                {{ $ligneCommande->commande_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>quantité commandé</strong>
                {{ $ligneCommande->quantiteCommande }}
            </div>
        </div>
        
    </div>
    </div>
@endsection