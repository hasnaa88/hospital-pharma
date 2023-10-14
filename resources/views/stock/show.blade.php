@extends('stock.layout')
@section('title')
Info sur le stock
@endsection
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('stock.index') }}">  <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
    <div class="row">
        <div class="mx-auto mb-5  p-2 text-success">
           
    
                <h2> Information sur le stock</h2>
           
           
        </div>
    </div>
 


    <div class="table table-bordered bg-white p-3 w-50 mx-auto ">
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group h4">
                <strong>Date d'entré : </strong>
                {{ $stock->dateEntre }}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group h4">
                <strong>Id de medicament : </strong>
                {{ $stock->medicament_id }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group h4">
                <strong>Id de pharmacien : </strong>
                {{ $stock->pharmacien_id }}
             </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group h4">
                <strong>Quantité : </strong>
                {{ $stock->quantite }}
            </div>
        </div>
      
    </div>
    </div>
@endsection