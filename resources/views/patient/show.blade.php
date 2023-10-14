@extends('patient.layout')
@section('title')
Info sur le patient
@endsection
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('patient.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
    <div class="row">
        <div class="mx-auto mb-5  p-2 text-primary " >
            
   
                <h1> Information sur le patient</h1>
      
            
           
        </div>
    </div>
  

    <div class="border border-3 bg-white p-3 w-50 mx-auto ">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Nom de patient :</strong>
                {{ $patient->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>La date de naissance : </strong>
                {{ $patient->dateNaissance }} 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Email</strong>
                {{ $patient->email }} mg
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telephone</strong>
                {{ $patient->telephone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Adresse : </strong>
                {{ $patient->adresse }}
            </div>
        </div>

        
    </div>
    </div>
@endsection