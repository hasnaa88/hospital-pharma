@extends('medicament.layout')
@section('title')
Modifier un  medicament
@endsection
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('medicament.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
    <div class="row">
        <div class="mx-auto mb-12 bg-white p-3 text-primary border border-primary">
           
                <h2>Modifier medicament</h2>
            
           
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
  
    <form action="{{ route('medicament.update',$medicament->id) }}" method="POST">
        @csrf
        @method('PUT')

        @if (session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get("success") }}</strong>
            <button type="button"
                data-dismiss="alert"
                class="close"
                aria-label="close">
                <span>&times;</span>
            </button>
        </div>
        @endif






         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom de medicament :</strong>
                    <input type="text" name="nomMedicament" value="{{ $medicament->nomMedicament }}" class="form-control" placeholder="nomMedicament">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prix de Medicament :</strong>
                    <input class="form-control"  name="prixMedicament" placeholder="prixMedicament" value=" {{$medicament->prixMedicament }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Dosage en mg :</strong>
                    <input class="form-control"  name="dosage" placeholder="dosage" value=" {{$medicament->dosage }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date de Production :</strong>
                    <input class="form-control" type="date" name="dateProduction" placeholder="dateProduction"  value="{{$medicament->dateProduction}}" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date de Peremption :</strong>
                    <input class="form-control" type="date"  name="datePeremption" placeholder="datePeremption" value="{{$medicament->datePeremption}}"  >
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Forme :</strong><br><div class=""></div>
                   
                    <select name="forme" class= "form-control" >
                        <option value="">--Choisir une forme--</option>
                    
                        
                          
        <option value=" Comprimé " {{ $medicament->forme =="Comprimé" ? 'selected ':""}}  >Comprimé</option>
        <option value="Comprimé effervescent" {{  $medicament->forme =="Comprimé effervescent" ? 'selected ':""}} >Comprimé effervescent</option>
         <option value="gélule" {{ $medicament->forme =="gélule" ? 'selected ':""}} >gélule</option>
         <option value="capsule"  {{ $medicament->forme =="capsule" ? 'selected ':""}} >capsule</option>
        <option value="sirop"  {{ $medicament->forme =="sirop" ? 'selected':""}}>sirop</option>
                    </select>
                </div>
            </div>





            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">ENREGISTRER</button>
            </div>
        </div>
   
    </form>
@endsection