@extends('ligneCommande.layout')
 @section('title')
     Gestion de ligne de Commande
 @endsection
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('pharmacien.home') }}"> Back</a>
</div>
    <div class="row" style="margin-top: 5rem;">
        <div class="mx-auto mb-5 bg-white p-3 text-success border border-success">

               
                <h2>Gestion de ligne de Commande</h2>
          
        </div>
        
    </div>
   

    <div class="pull-right mb-2">
               
        <a class="btn btn-success fa fa-plus" href="{{ route('ligneCommande.create') }}"></a>
        <br>
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

 
    <table class="table table-hover table-light  table-bordered">
        <tr>
       
            <th>Nom de medicament - forme</th>
            <th>Id de commande</th>
        
            <th>quantite de medicament commandé</th>
             
            <th width="280px">Action</th>
        </tr>
     
     @foreach ($ligneCommande as $ligne )
        <tr>
            
             <td> 
                @foreach ($medicaments  as $medicament)
                @if($ligne->medicament_id===$medicament->id)
                {{$medicament->nomMedicament}} - {{$medicament->forme}}
                @endif
            @endforeach 

   
                 </td>
       
            <td>{{ $ligne->commande_id }}</td>
         
            <td>{{ $ligne->quantiteCommande}}</td>
           
          
            <td>
               
                <form id="{{ $ligne->commande_id }}"   action="{{ route('ligneCommande.destroy',$ligne->id) }}" method="POST">   
                   
                    <a href="{{ route('ligneCommande.edit',$ligne->id) }}"> <i class="fa fa-edit" style="color:rgb(3, 217, 255);font-size:20px"></i></a>   
                    @csrf
                    @method('DELETE')      
                    <a type="submit" 
                    
                    onclick="event.preventDefault();
                    if(confirm('voulez vous supprimmer la ligne de commande dont ID :{{ $ligne->commande_id }}?'))
                    document.getElementById({{ $ligne->commande_id }}).submit()
                    "
                    
                    
                    
                    ><i class="fa fa-trash" style="color:red;font-size:20px"></i></a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {{$ligneCommande->links() }}  





@endsection