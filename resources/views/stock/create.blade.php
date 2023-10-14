@extends('stock.layout')
  
@section('content')
<div class="pull-right">
    <a class="btn btn-primary my-2" href="{{ route('stock.index') }}">  <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
<div class="row">
    <div class="mx-auto mb-5 bg-white p-3 text-success border border-success">

            <h2>Ajouter les medicaments dans stock</h2>
      
       
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

<form action="{{ route('stock.store') }}" method="POST">
    @csrf
 
     <div class="row">
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group h5">
                <strong>Date d'entré</strong>
                <input type="date" name="dateEntre" class="form-control" placeholder="dateEntre">
            </div>
        </div>
      
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group h5">
                <strong>Medicament</strong><br>
               
                <select name="medicament_id" class= "form-control">
                    <option value="">--choisir un medicament--</option>
                    @foreach ($data as $row)
                    
                        <option value="{{$row->id}}">{{$row->nomMedicament}} {{$row->forme}}</option>
                    @endforeach
                 
                </select>
            </div>
        </div>   

       







        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group h5">
                <strong>Pharmacien</strong><br>
               
                <select name="pharmacien_id" class= "form-control">
                    <option value="">--Choisir un pharmacien--</option>
                    @foreach ($data2 as $row2)
                    
                        <option value="{{$row2->id}}">{{$row2->name}}</option>
                    @endforeach
                 
                </select>
            </div>
        </div>
    
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group h5">
                <strong>Quantité</strong>
                <input type="number" class="form-control" name="quantite" placeholder="quantite">
            </div>
        </div>
     

    
        <div class="col-xs-5 col-sm-5 col-md-5 mx-auto">
                <button type="submit" class="btn btn-success">ENREGISTRER</button>
        </div>
    </div>
   
</form>
@endsection