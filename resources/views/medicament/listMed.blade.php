@extends('medicament.layout')
 @section('title')
     Liste des medicaments
 @endsection
@section('content')
<div class="pull-right">
  <a class="btn btn-primary" href="{{ route('medicament.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
<div class="row">
<div class="mx-auto mb-12 bg-white p-3 text-dark border border-dark">
           
  <h2>
    Liste des medicaments</h2>


</div>
</div>

<form class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-5 mb-2"  method="post" action="{{url('/search-list-med')}}" >
  {{ csrf_field() }}
  <input class="form-control form-control  w-75" type="text" placeholder="Recherche par  nom de medicament"
    aria-label="Search"  name="name" >
   <input type="submit"  value="chercher" class="btn btn-primary"> 
</form>



<!-------------------------------------------->

<div class="orders">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <h4 class="box-title">liste de  Medicament </h4>
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table ">
                <thead>
                  <tr>
                    <th class="serial">Id</th>
                    <th class="serial">Nom de Medicament</th>
                    <th class="avatar">Prix de Medicament</th>
                    <th>Dosage</th>
                    <th>Date de production</th>
                    <th>Date de peremption</th>
                    <th>L'état de medicament </th>
                    <th>Forme</th>
                 
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($medicament as $med)
                    <tr>
                     
                     
                      <td>  <span class="name">{{$med->id}}</span> </td>
                      <td>  <span class="name">{{$med->nomMedicament}}</span> </td>
                      <td>  <span class="name">{{$med->prixMedicament}} DH </span> </td>
                      <td> <span class="name">{{$med->dosage}} mg</span> </td>
                      <td><span class="name">{{$med->dateProduction}}</span></td>
                      {{-- <td><span class="name">{{$medicine->companies->company_name}}</span></td> --}}
                    
                      
                      <td><span class="name">{{$med->datePeremption}}</span></td>
                   
                      <td> @if ($med->datePeremption < date('Y-m-d '))<span class="name" style="background-color: red ;padding:5px ;color:white">Expiré </span>       

                     
                         @else
                         <span class="name" style="background-color: green ;padding:5px; color:white"> Valable</span>
                   
                      @endif
                    </td>
                      <td><span class="name">{{$med->forme}}</span></td>

                     
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