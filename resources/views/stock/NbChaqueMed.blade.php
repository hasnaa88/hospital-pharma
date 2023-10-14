@extends('stock.layout')

@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('stock.index') }}">  <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
  
</div>
<div class="row">
   
    <div class="mx-auto mb-5 bg-white p-3 text-success border border-success">

        <h2>La quantité de chaque médicament en stock groupé par nom et forme </h2>
    
    
    </div>

</div>


<table class="table table-hover table-light  table-bordered">
    <tr>
        <th>Nom medicament</th>
        
        <th>forme</th>
        <th>quantite dans stock</th>
        <th>disponibilité</th>
    </tr>

 @foreach ($quantiteMed as $quantMed )
    <tr>

        <td>{{ $quantMed->nomMedicament }}</td>
        <td>{{ $quantMed->forme }}</td>
        <td>{{ $quantMed->qt }}</td>
       <td>@if($quantMed->qt == 0)
           
        
        <span class="name" style="background-color: red ;padding:5px ;color:white"> Epuisé</span> 
    @else
    <span class="name" style="background-color:green ;padding:5px ;color:white"> disponible</span> 
        @endif
    </td>
       
       
    </tr>
    @endforeach
</table>

@endsection