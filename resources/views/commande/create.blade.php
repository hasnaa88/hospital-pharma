@extends('commande.layout')

@section('title')
Créer un nouveau medicament
@endsection

@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('commande.index') }}">back</a>
</div>
<div class="row">
    <div class="mx-auto mb-5 bg-white p-3 text-success border border-successb">
            <h2>Créer une commande</h2>
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
   

<form action="{{ route('commande.store') }}" method="POST">
    @csrf

     <div class="row">
     <!-------------------------------------------------------------------------------------------------------->    
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group h5">
                <strong>Date de commande</strong>
                <input type="date" name="dateCommande" class="form-control" placeholder="dateCommande">
            </div>
        </div>
    <!-------------------------------------------------------------------------------------------------------->  
  
        <div class="form-group h5">
            <strong> pharmacien</strong><br>
           
            <select name="    pharmacien_id" class= "form-control">
                <option value="">--Choisir un pharmacien--</option>
                @foreach ($pharma as $pha)
                
                    <option value="{{$pha->id}}">{{$pha->name}}</option>
                @endforeach
             
            </select>
        </div>
      <!-------------------------------------------------------------------------------------------------------->  
        
    <div class="form-group h5">
        <strong>fournisseur</strong><br>
       
        <select name="fournisseur_id" class= "form-control">
            <option value="">--Choisir un fournisseur--</option>
            @foreach ($fourni as $four)
            
                <option value="{{$four->id}}">{{$four->name}}</option>
            @endforeach
         
        </select>
    </div>
    
     <!-------------------------------------------------------------------------------------------------------->  
     
        <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                <button type="submit" class="btn btn-success">ENREGISTRER</button>
        </div>
   <!-------------------------------------------------------------------------------------------------------->  
    </div>
   
</form>


@endsection