@extends('stock.layout')

@section('content')

<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('pharmacien.home') }}">  <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>

<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-five">
                <div class="stat-icon dib flat-color-2">
                    <i class="pe-7s-cart"></i>
                </div>
                <div class="stat-content">
                    <div class="text-left dib">
                        <div class="stat-text"><span class="count">{{$sumQuantite}} </span></div>
                        <div class="stat-heading">quantité en stock</div>
                        <div class="stat-heading"><a href="{{url('/NbChaqueMed')}}">voir plus</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





















    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-center">
           
                <h2>Ajouter les stock</h2>
            </div>
            <div class="pull-right">
               
                <a class="btn btn-success fa fa-plus" href="{{ route('stock.create') }}"></a>
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
    







    <table class="table table-hover table-light  table-bordered">
        <tr>
            <th>Id</th>
            
            <th>Date d'entre</th>
            <th>Nom de medicament</th>
            <th>Forme de medicament</th>
            <th>Nom de pharmacien</th>
            <th>Quantite</th>
          
            <th width="150px">Action</th>
        </tr>
   
     @foreach ($stock as $st )
        <tr>
            <td>{{ $st->id }}</td>
            <td>{{ $st->dateEntre }}</td>
     

            <td>  <span class="name">  
                @foreach ($medicaments  as $medicament)
                @if($st->medicament_id===$medicament->id)
                {{$medicament->nomMedicament}}
                @endif
            @endforeach 

   
                  </span> </td>
              
                  <td>  <span class="name">  
                    @foreach ($medicaments  as $medicament)
                    @if($st->medicament_id===$medicament->id)
                    {{$medicament->forme}}
                    @endif
                @endforeach 
    
       
                      </span> </td>
              
                  <td>  <span class="name">  
                    @foreach ($pharmaciens  as $pharmacien)
                    @if($st->pharmacien_id===$pharmacien->id)
                    {{$pharmacien->name}}
                    @endif
                @endforeach 
    
       
                      </span> </td>
                  
            <td>{{ $st->quantite }}</td>
           



            <td>
                <form action="{{ route('stock.destroy',$st->id) }}" method="POST">   
                    <a href="{{ route('stock.show',$st->id) }}"><i class="fa fa-eye" style="color:rgb(14, 151, 87);font-size:20px"></i></a>    
                    <a  href="{{ route('stock.edit',$st->id) }}">  <i class="fa fa-edit" style="color:rgb(3, 217, 255);font-size:20px"></i></a>   
                    @csrf
                    @method('DELETE')      
                    <a  id="{{ $st->id }}" type="submit"

                    onclick="event.preventDefault();
                    if(confirm('voulez vous supprimmer le medicament :{{$st->medicament_id}}  dans le stock  :{{ $st->id }}?'))
                    document.getElementById({{$st->id }}).submit()
                    "
                    
                    > <i class="fa fa-trash" style="color:red;font-size:20px"></i></a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {{$stock->links() }}  
@endsection