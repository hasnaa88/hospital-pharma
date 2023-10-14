@extends('patient.layout')
  
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('patient.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>

  <div style="background-color: rgb(209, 209, 255); padding:10px">
<div class="row">
    <div class="mx-auto mb-12 bg-white p-3 text-primary border border-primary">
     
            <h2>Ajouter un nouveau patient</h2>
      
       
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
 
<form action="{{ route('patient.store') }}" method="POST">
    @csrf
 
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Le nom de patient  </strong>
                <input type="text" name="name" class="form-control" placeholder="Le nom de patient">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>la date de naissance</strong>
                <input  type="date" class="form-control"  name="dateNaissance" placeholder="le date de naissance">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>email</strong>
                <input  type="text" class="form-control"  name="email" placeholder="email">  
            </div>       
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>telephone</strong><br>
                <input  type="text" class="form-control"  name="telephone" placeholder="telephone">      
            </div>
              
            </div>
     

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Adresse</strong><br>
               
               <textarea type="text" class="form-control"  name="adresse" placeholder="adresse"> </textarea>
            </div>
        </div>

 




  
    

     
       
    
        <div class="col-xs-12 col-sm-12 col-md-12 mx-auto">
                <button type="submit" class="btn btn-success">ENREGISTRER</button>
        </div>
    </div>
   
</form>
   </div>
@endsection