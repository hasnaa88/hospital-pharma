@extends('medicament.layout')
 @section('title')
     Gestion de Medicament
 @endsection
@section('content')

<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('pharmacien.home') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> </a>
</div>
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-center">
      
        
            

                <h2>Gestion des medicaments</h2>
            </div>
            <div class="pull-right">
               
                <a class="btn btn-success mb-2 fa fa-plus" href="{{ route('medicament.create') }}"></a>
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
  
    <table class="table table-hover table-light  table-bordered  ">
        <tr>
            <th>No</th>
            <th>nom de medicament</th>
            <th>prix de Medicament</th>
            <th>dosage</th>
            <th>date de Production</th>
            <th>date de Peremption</th>
            <th>forme</th>
            <th width="150px">Action</th>
        </tr>
     
     @foreach ($medicament as $med )
        <tr>
            <td>{{ $med->id }}</td>
            <td>{{ $med->nomMedicament }}</td>
            <td>{{ $med->prixMedicament }}</td>
            <td>{{ $med->dosage }}</td>
            <td>{{ $med->dateProduction }}</td>
            <td>{{ $med->datePeremption }}</td>
            <td>{{ $med->forme }}</td>
            <td>
                <form id="{{ $med->id }}"   action="{{ route('medicament.destroy',$med->id) }}" method="POST">   
                    <a href="{{ route('medicament.show',$med->id) }}"><i class="fa fa-eye" style="color:rgb(14, 151, 87);font-size:20px"></i></a>    
                    <a  href="{{ route('medicament.edit',$med->id) }}"><i class="fa fa-edit" style="color:rgb(3, 217, 255);font-size:20px"></i></a>   
                    @csrf
                    @method('DELETE')      
                    <a type="submit" 
                    
                    onclick="event.preventDefault();
                    if(confirm('voulez vous supprimmer le medicament :{{ $med->nomMedicament }} {{ $med->forme }}?'))
                    document.getElementById({{ $med->id }}).submit()
                    "
                    
                    
                    
                    ><i class="fa fa-trash" style="color:red;font-size:20px"></i></a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {{$medicament->links() }}  





@endsection