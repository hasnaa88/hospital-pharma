@extends('stock.layout')
   
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('stock.index') }}">  <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
    <div class="row">
        <div class="mx-auto mb-5 bg-white p-3 text-success border border-success">
      
                <h2>Edit stock</h2>
       
           
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
  
    <form action="{{ route('stock.update',$stock->id) }}" method="POST">
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
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group h5">
                    <strong>dateEntre</strong>
                    <input class="form-control"  name="dateEntre" placeholder="dateEntre" value=" {{$stock->dateEntre }}">
                </div>
            </div>
<!------------------------------------------------------------------------------->

<div class="col-xs-5 col-sm-5 col-md-5">
        <div class="form-group h5">
            <strong>Medicament</strong><br>
           
            <select name="medicament_id" class= "form-control">
                <option value="">--Choisir un medicament--</option>
                @foreach ($data as $row)
                
                    <option
                    {{ $stock->medicament_id === $row->id ? "selected ":""}}     
                    
                    value="{{$row->id}}">{{$row->nomMedicament}}</option>
                @endforeach
             
            </select>
        </div>
</div>
<!--------------------------------------------------------------------------------->







<!---------------------------------------------------------------------------------->

<div class="col-xs-5 col-sm-5 col-md-5">
    <div class="form-group h5">
        <strong>Pharmacien</strong><br>
       
        <select name="pharmacien_id" class= "form-control">
            <option value="">---Choisir un pharmacien--</option>
            @foreach ($data2 as $row2)
            
                <option
                {{ $stock->pharmacien_id === $row2->id ? "selected ":""}}     
                
                value="{{$row2->id}}">{{$row2->name}}</option>
            @endforeach
         
        </select>
    </div>
</div>











<!----------------------------------------------------------------------------------->

            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group h5">
                    <strong>quantite</strong>
                    <input class="form-control"  name="quantite" placeholder="quantite" value=" {{$stock->quantite }}">
                </div>
            </div>
           
            <div class="col-xs-5 col-sm-5 col-md-5 mx-auto">
              <button type="submit" class="btn btn-success">ENREGISTRER</button>
            </div>
        </div>
   
    </form>
@endsection