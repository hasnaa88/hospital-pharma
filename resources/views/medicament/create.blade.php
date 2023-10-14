@extends('medicament.layout')
@section('title')
Créer un nouveau medicament
@endsection
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('medicament.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
<div class="row">
    <div class="mx-auto mb-12 bg-white p-3 text-success border border-success">
      
            <h2>Créer un nouveau médicament</h2>
    
      
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
   
<form action="{{ route('medicament.store') }}" method="POST">
    @csrf



  

     <div class="row ">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom de medicament :</strong>
                <input type="text" name="nomMedicament" class="form-control" placeholder="nom de Medicament">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix de medicament :</strong>
                <input class="form-control"  name="prixMedicament" placeholder="Enter prixMedicament">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Dosage en mg :</strong>
                <input class="form-control" name="dosage" placeholder="Enter dosage">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date de production :</strong>
                <input type="date" class="form-control"  name="dateProduction" placeholder="Enter dateProduction">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date de Peremption:</strong>
                <input type="date" class="form-control"  name="datePeremption" placeholder="Enter datePeremption">
            </div>
        </div>
<!------------------------------------------------------------------------------------->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Forme</strong><br>
       
        <select name="forme" class= "form-control">
            <option value="">--Please choose an option--</option>
                <option value="Comprimé">Comprimé</option>
                <option value="Comprimé effervescent">Comprimé effervescent</option>
                <option value="gélule">Gélule</option>
                <option value="capsule">Capsule</option>
                <option value="sirop">Sirop</option>
        </select>
    </div>
</div>






    
        <div class="col-xs-12 col-sm-12 col-md-12 text-center ">
                <button type="submit" class="btn btn-success">ENREGISTRER</button>
        </div>
    </div>
   
</form>


@endsection