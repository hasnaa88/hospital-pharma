
@extends('ordonnance.layout')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@section('content')

<div class="pull-right">
    <a class="btn btn-primary mt-1 mr-0" href="{{ route('medecin.home') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb ">
            <div class="pull-center">
           
                <h2>Ajouter les ordonnances</h2>
            </div>
            <div class="pull-right">
               
                <a class="btn btn-success mb-2 fa fa-plus" href="{{ route('ordonnance.create') }}"></a>
                
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
        


            <th>id</th>
            <th>titre de l'ordonnance</th>
            <th>date  de ordonnance</th>
        
            <th>Nom de medicament</th>
            <th>nombre de fois/ jour</th>
            <th>durée d'usage en jour</th>
            <th width="280px">Action</th>
        </tr>
      
        
      
     @foreach ($ordonnance as $ord )
        <tr>
            <td>{{ $ord->id }}</td>
            <td>{{ $ord->titreOrdonnace }}</td>
            <td>{{ $ord->dateOrdonnace }}</td>
       
           


            <td>  <span class="name">  
                @foreach ($medicaments  as $medicament)
                @if($ord->medicament_id===$medicament->id)
                {{$medicament->nomMedicament}}
                @endif
            @endforeach 

   
                  </span> </td>


            <td>{{ $ord->nombreFoisMedicament }}</td>
            <td>{{ $ord->duree_usage }}</td>
          
            <td>
   <!---- <i class="fa fa-eye" style="color:rgb(14, 151, 87);font-size:20px"></i>
     <i class="fa fa-edit" style="color:rgb(3, 217, 255);font-size:20px"></i>
     <i class="fa fa-trash" style="color:red;font-size:20px"></i>--> 

                <form  id="{{$ord->id }}"   action="{{ route('ordonnance.destroy',$ord->id) }}" method="POST">   
                    <a href="{{ route('ordonnance.show',$ord->id) }}"><i class="fa fa-eye" style="color:rgb(14, 151, 87);font-size:20px"></i></a>    
                    <a href="{{ route('ordonnance.edit',$ord->id) }}">  <i class="fa fa-edit" style="color:rgb(3, 217, 255);font-size:20px"></i>
                    </a>   
                    @csrf
                    @method('DELETE')      
                    <a type="submit"
                    onclick="event.preventDefault();
                    if(confirm('voulez vous supprimmer ordonnance dont ID :{{ $ord->id }}?'))
                    document.getElementById({{$ord->id }}).submit()
                    "
                    
                    >
                     
                    <i class="fa fa-trash" style="color:red;font-size:20px"></i>




                </a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {{$ordonnance->links() }}  
@endsection