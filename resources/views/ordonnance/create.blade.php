@extends('ordonnance.layout')
  
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('ordonnance.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>

  <div style="background-color: rgb(209, 209, 255); padding:10px">
<div class="row">
    <div class="mx-auto mb-12 bg-white p-3 text-primary border border-primary">
     
            <h2>Ajouter nouvelle ordonnance</h2>
      
       
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
 
<form action="{{ route('ordonnance.store') }}" method="POST">
    @csrf
 
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Titre de Ordonnace:</strong>
                <input type="text" name="titreOrdonnace" class="form-control" placeholder="titre de Ordonnace">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Date de l'ordonnace:</strong>
                <input  type="date" class="form-control"  name="dateOrdonnace" placeholder="dateOrdonnace">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Description:</strong>
                <textarea class="form-control" name="description" placeholder="description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>medicament</strong><br>
               
                <select name="medicament_id" class= "form-control">
                    <option value="">--choisir un medicament--</option>
                    @foreach ($data as $row)
                    
                        <option value="{{$row->id}}">{{$row->nomMedicament}} {{$row->forme}} {{$row->dosage}} mg</option>
                    @endforeach
                 
                </select>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group ">
                <strong>Patient</strong><br>
               
                <select name="patient_id" class= "form-control">
                    <option value="">--Choisir un patient--</option>
                    @foreach ($patient as $pat)
                    
                        <option value="{{$pat->id}}">{{$pat->name}}</option>
                    @endforeach
                 
                </select>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group ">
                <strong>medecin</strong><br>
               
                <select name="medecin_id" class= "form-control">
                    <option value="">--choisir un medecin--</option>
                    @foreach ($medecin as $medc)
                    
                        <option value="{{$medc->id}}">{{$medc->name}}</option>
                    @endforeach
                 
                </select>
            </div>
        </div>





  
    


        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group ">
                <strong>nombre de fois de medicament /jour:</strong>
                <input type="number" class="form-control" name="nombreFoisMedicament">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group ">
                <strong>duré d'usage en jours:</strong>
                <input type="number" class="form-control" name="duree_usage" >
            </div>
        </div>
     
       
    
        <div class="col-xs-12 col-sm-12 col-md-12 mx-auto">
                <button type="submit" class="btn btn-success">ENREGISTRER</button>
        </div>
    </div>
   
</form>
   </div>
@endsection