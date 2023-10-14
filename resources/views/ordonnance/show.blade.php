@extends('ordonnance.layout')
  
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('ordonnance.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
    <div class="row">
        <div class="mx-auto mb-5  p-2 text-success ">
           
                <h2> Information sur le ordonnance</h2>
           
           
        </div>
    </div>



    <div class="table table-bordered bg-white p-3 w-50 mx-auto  box-shadow" id="{{$ordonnance->id}}">
        <div   style="background-color: #03B5AA ; margin:10px">
           <h1 style="color: #ffffff;text-align:center"> hospital pharmacy</h1>  

        </div>


    <div class="row " style="text-indent: 20px;">

        <div class="col-xs-6 col-sm-6 col-md-6" >
            <div class="form-group">
                <strong>Dr.</strong>  @foreach ($medecins as $medecin)
                @if($ordonnance->medecin_id===$medecin->id)
                {{$medecin->name}}  
                @endif
            @endforeach 
              
            </div>
        </div>
    

        <div class="col-xs-12 col-sm-12 col-md-12" >
            <div class="form-group ">
                <strong>titre de l'ordonnace:</strong>
                {{ $ordonnance->titreOrdonnace }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>date  de l'ordonnance  : </strong>
                {{ $ordonnance->dateOrdonnace }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>description : </strong>
                {{ $ordonnance->description }}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Nom de medicament :</strong>
                @foreach ($medicaments as $medicament)
                
                @if($medicament->id=== $ordonnance->medicament_id)
                    {{ $medicament->nomMedicament }}  
                    @endif
                @endforeach
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>nom de patient :</strong>
                @foreach ($patients as $patient)
                @if($ordonnance->patient_id===$patient->id)
                {{$patient->name}}
                @endif
            @endforeach 
            </div>
          </div>

  

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nombre de Fois Medicament :</strong>
                {{ $ordonnance->nombreFoisMedicament }} fois par jours
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>durée d'usage :</strong>
                {{ $ordonnance->duree_usage }} jours
            </div>
        </div>
       
    </div>
    
    </div>




    <div class="mt-2 d-flex justify-content-center">
        
        <a href="#" target="_blank"  class="btn btn-sm btn-primary"
            onclick="print({{ $ordonnance->id }})"
            >
           print
        </a>
    </div>
<!------------------------------------------------------------------------------------------------->
<!--<div class="row no-print">
    <div class="col-12">

      <a href="" @click.prevent="printme" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
     
    </div>
  </div> ---->


@endsection


    <script>
        function print(el){
            const page = document.body.innerHTML;
            const content = document.getElementById(el).innerHTML;
            document.body.innerHTML = content;
            window.print();
            document.body.innerHTML = page;
        }
    </script>

