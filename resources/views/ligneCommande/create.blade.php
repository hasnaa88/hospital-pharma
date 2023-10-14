@extends('ligneCommande.layout')
@section('title')
Créer un nouveau medicament
@endsection
@section('content')

<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('ligneCommande.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>


<div class="row">
    <div class="mx-auto mb-12 bg-white p-3 text-success border border-success">
       
            <h2>Créer un nouveau ligne de Commande</h2>
    
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('ligneCommande.store') }}" method="POST">
    @csrf
   
    
         <div class="row">
        <!--------------------------------------------------------------------------------------->
     

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group h4">
                <strong>Id de commande</strong><br>
               
                <select name="commande_id" class= "form-control">
                    <option value="">--Choisir une commande--</option>
                    @foreach ($data2 as $row2)
                    
                        <option value="{{$row2->id}}">{{$row2->id}}</option>
                    @endforeach
                 
                </select>
            </div>
        </div>
    <!-------------------------------------------------------------------------------------------------------->  
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group h4">
                <strong>Nom de medicament - forme</strong><br>
               
                <select name="medicament_id" class= "form-control">
                    <option value="">--Choisir un medicament--</option>
                    @foreach ($data as $row)
                    
                        <option value="{{$row->id}}">{{$row->nomMedicament}} - {{$row->forme}} </option>
                    @endforeach
                 
                </select>
            </div>
        </div>

        <!-------------------------------------------------------------------------->
        
      
        <!--------------------------------------------------------------------------------------->


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group h4">
                <strong>Quantité commandé</strong>
                <input class="form-control"  name="quantiteCommande" placeholder="Enter quantiteCommande">
            </div>
        </div>

     <!--------------------------------------------------------------------------------------->

     <div class="col-xs-12 col-sm-12 col-md-12 mx-auto">
        <br>   <br>   <br>
                <button type="submit" class="btn btn-success">ENREGISTRER</button>
        </div>
     <!--------------------------------------------------------------------------------------->

    </div>
   
</form>


@endsection