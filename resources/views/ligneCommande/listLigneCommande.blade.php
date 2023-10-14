@extends('medicament.layout')
 @section('title')
     Liste des medicaments
 @endsection
@section('content')
<div class="pull-right">
  <a class="btn btn-primary" href="{{ route('medicament.index') }}"> Back</a>
</div>


<form method="post" action="{{url('/search-list-med')}}" >
      
  {{ csrf_field() }}
  <input type="text" name="name">
  <input type="submit" value="Search">
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
                    <th class="serial">id</th>
                    <th class="serial">nom de Medicament</th>
                    <th class="avatar">prixd de Medicament</th>
                    <th>dosage</th>
                    <th>date de production</th>
                    <th>date de peremption</th>
                 
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($medicament as $med)
                    <tr>
                     
                     
                      <td>  <span class="name">{{$med->id}}</span> </td>
                      <td>  <span class="name">{{$med->nomMedicament}}</span> </td>
                      <td>  <span class="name">{{$med->prixMedicament}}</span> </td>
                      <td> <span class="name">{{$med->dosage}}</span> </td>
                      <td><span class="name">{{$med->dateProduction}}</span></td>
                      <td><span class="name">{{$med->datePeremption}}</span></td>
                     
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