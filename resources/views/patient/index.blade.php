
@extends('patient.layout')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@section('content')
<div class="pull-right">
    <a class="btn btn-primary mt-1 mr-0" href="{{ route('medecin.home') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb ">
            <div class="pull-center">
           
                <h2>Ajouter les patient</h2>
            </div>
            <div class="pull-right">
               
                <a class="btn btn-success mb-2 fa fa-plus" href="{{route('patient.create')}}"></a>
                
                <br>
            </div>

        </div>
    </div>
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

<table class="table table-hover table-light  table-borderedr ">
      
    <tr style="background-color: rgb(209, 209, 255)" >



   
   <th>ID de patient </th>
   <th>Nom de patient</th>

   <th>Date de naissance</th>
   <th>Email de patient</th>
   <th>Téléphone</th>
   <th>Adresse</th>
   <th width="280px">Action</th>   
</tr>
@foreach ($patient as $pat )
<tr>
    <td>{{ $pat->id }}</td>
    <td>{{ $pat->name }}</td>
    <td>{{ $pat->dateNaissance }}</td>
    <td>{{ $pat->email }}</td>

    <td>{{ $pat->telephone }}</td>
   
    <td>{{ $pat->adresse }}</td>
  
    <td>


        <form  id="{{$pat->id }}"   action="{{ route('patient.destroy',$pat->id) }}" method="POST">   
            <a href="{{ route('patient.show',$pat->id) }}"><i class="fa fa-eye" style="color:rgb(14, 151, 87);font-size:20px"></i></a>    
            <a href="{{ route('patient.edit',$pat->id) }}">  <i class="fa fa-edit" style="color:rgb(3, 217, 255);font-size:20px"></i>
            </a>   
            @csrf
            @method('DELETE')      
            <a type="submit"
            onclick="event.preventDefault();
            if(confirm('voulez vous supprimmer le patient dont le nom :{{ $pat->name }}?'))
            document.getElementById({{$pat->id }}).submit()
            "
            
            >
             
            <i class="fa fa-trash" style="color:red;font-size:20px"></i>




        </a>
        </form>
    </td>
</tr>
@endforeach

</table>  
 
{{$patient->links() }}  









@endsection