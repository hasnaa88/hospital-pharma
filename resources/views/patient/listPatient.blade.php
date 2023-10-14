
@extends('patient.layout')

@section('title')
    Liste des patients
@endsection
@section('content')
<div class="pull-right">
 <a class="btn btn-primary mb-2" href="{{ route('medecin.home') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>

<div class="row">
 <div class=" p-3 text-primary ">
 
         <h2>Liste des patients</h2>
     
    
 </div>
</div>





<!-------------------------------------------->


<div class="orders">
 <div class="row">
   <div class="col-xl-12">
     <div class="card" style=" box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);">
       <div class="card-body">
         <h4 class="box-title">Liste des patients</h4>
       </div>
       <div class="card-body--">
         <div class="table-stats order-table ov-h">
           <table class="table " >
             <thead>
                 <tr >
                   <th class="serial">id</th>
                   <th class="serial"><span class="name">Nom de patient</span></th>
                   <th class="avatar">date de naissance</th>
                   <th>l'email</th>
                   <th>telephone</th>
                   <th>adresse</th>
                 
                   <th>ordonnance</th>
          
                
                 </tr>
               </thead>
               <tbody>
                 
                 @foreach ($patients as $patient)
                   <tr>
                    
                    
                     <td>  <span class="name">{{$patient->id}}</span> </td>
                     <td>  <span class="name">{{$patient->name}}</span> </td>
                     <td>  <span class="name">{{$patient->dateNaissance}}</span> </td>
                     <td> <span class="name">{{$patient->email}}</span> </td>
                     <td> <span class="name">{{$patient->telephone}}</span> </td>
                     <td> <span class="name">{{$patient->adresse}}</span> </td> 

                     <td> <span class="name" >
                     @foreach ($ordonnances  as $ordonnance)
                     
                         @if($ordonnance->patient_id===$patient->id)
                     
                     
                     <a href="/ordonnance/{{$ordonnance->id}}" style="background-color:#21e27b; padding: 6px;color:#fff;margin:2px" > {{$ordonnance->id}}   </a>
                  
                     @endif 
                   
                    
                 @endforeach 
                </span></td> 
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
 {{$patients->links() }}  
 @endsection