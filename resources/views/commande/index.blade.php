@extends('commande.layout')
 @section('title')
     Gestion de commande 
 @endsection
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('pharmacien.home') }}"> Back</a>
</div>
    <div class="row" style="margin-top: 5rem;">
        <div class="mx-auto mb-5 bg-white p-3 text-success border border-success">
            <div class="pull-center">
               
                <h2>Gestion de commandes</h2>
            </div>
          
          
        </div>
        
    </div>
    <div class="pull-right mb-3">
               
        <a class="btn btn-success mb-2 fa fa-plus" href="{{ route('commande.create') }}">  </a>
      
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
 <!-------------------------------------------------------------------------------------------------------->  
        <tr>
            <th>id</th>
            <th>date de commande </th>
            <th>nom de pharmacien</th>
            <th>nom de fournisseur</th>
            <th width="280px">Action</th>
        </tr>
 <!-------------------------------------------------------------------------------------------------------->  
     @foreach ($commande as $com )
        <tr>
            <td>{{ $com->id }}</td>
            <td>{{ $com->dateCommande }}</td>
            <td>  <span class="name">  
                @foreach ($pharma  as $pha)
                @if($com->pharmacien_id===$pha->id)
                {{$pha->name}}
                @endif
            @endforeach 

   
                  </span> </td>
              
              
             
             
            
              <td>  <span class="name">
                @foreach ($fournisseurs as $fournisseur)
                @if($com->fournisseur_id===$fournisseur->id)
                {{$fournisseur->name}}
                @endif
            @endforeach 
                </span> </td>
            
            <td>
     
               
  
                <form id="{{ $com->id }}"   action="{{ route('commande.destroy',$com->id) }}" method="POST">   
                    <a  href="{{ route('commande.show',$com->id) }}"><i class="fa fa-eye" style="color:rgb(14, 151, 87);font-size:20px"></i></a>    
                    <a href="{{ route('commande.edit',$com->id) }}"><i class="fa fa-edit" style="color:rgb(3, 217, 255);font-size:20px"></i></a>   
                    @csrf
                    @method('DELETE')      
                    <a type="submit" 
                    onclick="event.preventDefault();
                    if(confirm('voulez vous supprimmer la commandee dont ID :{{ $com->id }}?'))
                    document.getElementById({{ $com->id }}).submit()
                    "
                    
                    
                    >  <i class="fa fa-trash" style="color:red;font-size:20px"></i></a>
                    
                </form>
            </td>
        </tr>
        @endforeach
     <!-------------------------------------------------------------------------------------------------------->  
    </table>  
    {{$commande->links() }}  





@endsection