@extends('commande.layout')

@section('title')
Modifier un  commande
@endsection

@section('content')

<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('commande.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>

    <div class="row">
        <div class="mx-auto mb-5 bg-white p-3 text-success border border-success">
                <h2>Modifier la commande</h2>
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
  

    <form action="{{ route('commande.update',$commande->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
    <!-------------------------------------------------------------------------------------------------------->  
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group h4">
                    <strong>Date de commande</strong>
                    <input type="date" name="dateCommande" value="{{ $commande->dateCommande }}" class="form-control" placeholder="Date de commande">
                </div>
            </div>
     <!-------------------------------------------------------------------------------------------------------->  
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group h5">
                    <strong>Pharmacien</strong><br>
                   
                    <select name="pharmacien_id" class= "form-control">
                        <option value="">---Choisir un pharmacien--</option>
                        @foreach ($pharmaciens as $pharmacien)
                        
                            <option
                            {{ $commande->pharmacien_id === $pharmacien->id ? "selected ":""}}     
                            
                            value="{{$pharmacien->id}}">{{$pharmacien->name}}</option>
                        @endforeach
                     
                    </select>
                </div>
            </div>
        <!-------------------------------------------------------------------------------------------------------->          

            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group h5">
                    <strong>Pharmacien</strong><br>
                   
                    <select name="pharmacien_id" class= "form-control">
                        <option value="">---Choisir un fournisseur--</option>
                        @foreach ($fournisseurs as $fournisseur)
                        
                            <option
                            {{ $commande->fournisseur_id === $fournisseur->id ? "selected ":""}}     
                            
                            value="{{$fournisseur->id}}">{{$fournisseur->name}}</option>
                        @endforeach
                     
                    </select>
                </div>
            </div>
        <!-------------------------------------------------------------------------------------------------------->  
      
  
            <div class="col-xs-5 col-sm-5 col-md-5 mx-auto">
                <br>       <br>    
              <button type="submit" class="btn btn-success">ENREGISTRER</button>
            </div>
      <!-------------------------------------------------------------------------------------------------------->  
        </div>
   
    </form>
@endsection