
@extends('ordonnance.layoutPharmacien')

@section('title')
    Liste des ordonnances
@endsection
@section('content')
<div class="pull-right">
 <a class="btn btn-primary mb-2" href="{{ route('pharmacien.home') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>

<form class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2 mb-2"  method="post" action="{{url('/searchOrdPharma')}}" >
 {{ csrf_field() }}
 <input class="form-control form-control  w-20" type="text" placeholder="Recherche par id"
   aria-label="Search"  name="name" >
  <input type="submit"  value="chercher" class="btn btn-primary"> 
</form>






<!-------------------------------------------->


<div class="orders">
 <div class="row">
   <div class="col-xl-12">
     <div class="card">
       <div class="card-body">
         <h4 class="box-title">Liste des ordonnances</h4>
       </div>
       <div class="card-body--">
         <div class="table-stats order-table ov-h">
           <table class="table ">
             <thead>
                 <tr>
                   <th class="serial">Id</th>
                   <th class="serial"><span class="name">titre de l'ordonnance</span></th>
                   <th class="avatar">Date de l'ordonnance</th>
                   <th>description</th>
                   <th>nom de medicament</th>
                   <th>nom de patient </th>
                   <th>nom de medecin</th>
           <th>nombre de fois Medicament /jour</th>
           <th>durér d'usage en jours</th>
                
                 </tr>
               </thead>
               <tbody>
                 
                 @foreach ($ordonnance as $ord)
                   <tr>
                    
                    
                     <td>  <span class="name">{{$ord->id}}</span> </td>
                     <td>  <span class="name">{{$ord->titreOrdonnace}}</span> </td>
                     <td>  <span class="name">{{$ord->dateOrdonnace}}</span> </td>
                     <td> <span class="name">{{$ord->description}}</span> </td>
                    
                     <td>  <span class="name">  
                      @foreach ($medicaments  as $medicament)
                      @if($ord->medicament_id===$medicament->id)
                      {{$medicament->nomMedicament}}
                      @endif
                  @endforeach 
      
         
                        </span> </td>

                        <td>  <span class="name">  
                          @foreach ($patients  as $patient)
                          @if($ord->patient_id===$patient->id)
                          {{$patient->name}}
                          @endif
                      @endforeach 
          
             
                            </span> </td>
                   
                            <td>  <span class="name">  
                              @foreach ($medecins  as $medecin)
                              @if($ord->medecin_id===$medecin->id)
                              {{$medecin->name}}
                              @endif
                          @endforeach 
              
                 
                                </span> </td>

                    <td><span class="name">{{ $ord->nombreFoisMedicament }}</span></td>
                     <td><span class="name">{{ $ord->duree_usage }}</span></td>
                   </tr>
                 
                 @endforeach


               </tbody>
            
             </table>
           </div> <!-- /.table-stats -->
         </div>
       </div> <!-- /.card -->
     </div>  <!-- /.col-lg-8 -->


   </div>
 </div>
 <!-- /.orders -->

 @endsection