@extends('ligneCommande.layout')
@section('title')
Modifier un  ligneCommande
@endsection
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('ligneCommande.index') }}"> Back</a>
</div>

    <div class="row">
        <div class="mx-auto mb-5 bg-white p-3 text-success border border-success">
           
                <h2>Edit ligneCommande</h2>
            
           
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
  
    <form action="{{ route('ligneCommande.update',$ligneCommande->id) }}" method="POST">
        @csrf
        @method('PUT')
 
         <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group h4">
                    <strong>Nom de medicament</strong><br>
                   
                    <select name="medicament_id" class= "form-control">
                        <option value="">--Choisir un medicament--</option>
                        @foreach ($data as $row)
                        
                            <option
         {{ $ligneCommande->id_medicament  === $row->id_medicament ? "selected ":""}}                   
                            
                            value="{{$row->id}}">{{$row->nomMedicament}}</option>
                        @endforeach
                     
                    </select>
                </div>
            </div>




            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group h4">
                    <strong>Id de commande</strong><br>
                   
                    <select name="commande_id" class= "form-control">
                        <option value="">--Choisir une commande--</option>
                        @foreach ($data2 as $row2)
                        
                            <option value="{{$row2->id}}"
                                {{ $ligneCommande->commande_id  === $row2->id ? "selected ":""}}  
                                
                                >{{$row2->id}}</option>
                        @endforeach
                     
                    </select>
                </div>
            </div>
        

            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group h4">
                    <strong>Quantité commandé</strong>
                    <input class="form-control"  name="quantiteCommande" placeholder="dosage" value=" {{$ligneCommande->quantiteCommande }}">
                </div>
            </div>
           
            <div class="col-xs-5 col-sm-5 col-md-5 mx-auto">
                <br>   <br>   <br>
              <button type="submit" class="btn btn-success">ENREGISTRER</button>
            </div>
        </div>
   
    </form>
@endsection