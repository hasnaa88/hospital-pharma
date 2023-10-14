@extends('medicament.layout')
@section('title')
Info sur le medicament
@endsection
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('medicament.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
    <div class="row">
        <div class="mx-auto mb-5  p-2 text-primary " >
            
   
                <h1> Information sur le medicament</h1>
      
            
           
        </div>  
    </div>
  

    <div class="border border-3 bg-white p-3 w-50 mx-auto ">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Nom de médicament :</strong>
                {{ $medicament->nomMedicament }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Prix de médicament : </strong>
                {{ $medicament->prixMedicament }} DH
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Dosage : </strong>
                {{ $medicament->dosage }} mg
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date de production : </strong>
                {{ $medicament->dateProduction }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Date de peremption : </strong>
                {{ $medicament->datePeremption }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Forme : </strong>
                {{ $medicament->forme }}
            </div>
        </div>
    </div>
    </div>
@endsection