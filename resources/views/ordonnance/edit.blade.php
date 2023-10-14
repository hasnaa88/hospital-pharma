@extends('ordonnance.layout')
   
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('ordonnance.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
<div style="background-color: rgb(209, 209, 21212); padding:10px">
    <div class="row">
        <div class="mx-auto mb-12 bg-white p-3 text-primary border border-primary">
        
                <h2>Modifier ordonnance</h2>
            
           
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
  
    <form action="{{ route('ordonnance.update',$ordonnance->id) }}" method="POST">
        @csrf
        @method('PUT')
<!----------------------message de ubdated succesful------------------------------>
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
<!------------------------------------------------------------------------------------------------------>

         <div class="row">


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>titreOrdonnace:</strong>
                    <input type="text" name="titreOrdonnace" value="{{ $ordonnance->titreOrdonnace }}" class="form-control" placeholder="titreOrdonnace">
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>dateOrdonnace</strong>
                    <input class="form-control"  name="dateOrdonnace" placeholder="dateOrdonnace" value=" {{$ordonnance->dateOrdonnace }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>description</strong>
                    <input class="form-control"  name="description" placeholder="description" value=" {{$ordonnance->description }}">
                </div>
            </div>
 <!------------------------------------------------------------------------------->
 
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom de medicament</strong><br>
           
            <select name="medicament_id" class= "form-control">
                <option value="">--Please choose an option--</option>
                @foreach ($data as $row)
                
                    <option
 {{ $ordonnance->medicament_id  === $row->id ? "selected ":""}}                   
                    
                    value="{{$row->id}}">{{$row->nomMedicament}} {{$row->forme}} {{$row->dosage}} mg </option>
                @endforeach
             
            </select>
        </div>
    </div>

<!--------------------------------------------------------------------------------->

<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <strong>Patient</strong><br>
       
        <select name="pharmacien_id" class= "form-control">
            <option value="">---Choisir un patient--</option>
            @foreach ($patient as $pat)
            
                <option
                {{ $ordonnance->patient_id === $pat->id ? "selected ":""}}     
                
                value="{{$pat->id}}">{{$pat->name}}</option>
            @endforeach
         
        </select>
    </div>
</div>


<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <strong>Medecin</strong><br>
       
        <select name="pharmacien_id" class= "form-control">
            <option value="">---Choisir un patient--</option>
            @foreach ($medecin as $medc)
            
                <option
                {{ $ordonnance->medecin_id === $medc->id ? "selected ":""}}     
                
                value="{{$medc->id}}">{{$medc->name}}</option>
            @endforeach
         
        </select>
    </div>
</div>
 
 
<!------------------------------------------------------------------------------->
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <strong>nombreFoisMedicament:</strong>
        <input class="form-control" name="nombreFoisMedicament" value="{{ $ordonnance->nombreFoisMedicament }} " placeholder="nombreFoisMedicament">
    </div>
</div>
<!------------------------------------------------------------------------------->
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <strong>duree_usage:</strong>
        <input class="form-control" name="duree_usage" value="{{$ordonnance->duree_usage }}"  placeholder="duree_usage">
    </div>
</div>

<!------------------------------------------------------------------------------->
            <div class="col-xs-12 col-sm-12 col-md-12 mx-auto">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
   
    </form>
</div>
@endsection