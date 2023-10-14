@extends('patient.layout')
   
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('patient.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
<div style="background-color: rgb(209, 209, 21212); padding:10px">
    <div class="row">
        <div class="mx-auto mb-12 bg-white p-3 text-primary border border-primary">
        
                <h2>Modifier les indormations de patient</h2>
            
        
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
  
    <form action="{{ route('patient.update',$patient->id) }}" method="POST">
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
                    <strong>Le nom de patient </strong>
                    <input type="text" name="name" value="{{$patient->name}}" class="form-control" placeholder="Le nom de patient">
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>la date de naissance</strong>
                    <input   type="date" class="form-control"  name="dateNaissance" placeholder="la date de naissance" value="{{$patient->dateNaissance}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>email</strong>
                    <input class="form-control"  name="email" placeholder="email" value="{{$patient->email}}">
                </div>
            </div>

<!------------------------------------------------------------------------------->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>telephone</strong>
        <input class="form-control" name="telephone" value="{{ $patient->telephone }} " placeholder="telephone">
    </div>
</div>
<!------------------------------------------------------------------------------->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>adresse</strong>
        <textarea class="form-control" name="adresse" value="{{$patient->adresse }}"  placeholder="adresse"></textarea>
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