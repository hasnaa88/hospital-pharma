
 <!---<div class="row">
                        <div class="my-2 col-md-3">
                            <h2 class="text-muted border border-3 ">
                                {{ Carbon\Carbon::now() }}
                            </h2>
                        </div>
 </div>
---->
<!--------------------------------------------------------------------->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card" style=" box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);height: 120px">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-4">
                        <i class="pe-7s-users"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">{{ DB::table('fournisseurs')->count()}}</span></div>
                            <div class="stat-heading">Nombre fournisseur</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6" >
        <div class="card" style=" box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);height: 120px">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-2">
                        <i class="pe-7s-cart"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count"> {{ DB::table('stock_medicaments')->sum('quantite')}} </span></div>
                            <div class="stat-heading">quantité de medicament en stock</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card" style=" box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);height: 120px">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-3">
                        <i class="pe-7s-browser"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">{{ DB::table('medicaments')->count()}}</span></div>
                            <div class="stat-heading">Medicaments crées</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card" style=" box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);height: 120px">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-4">
                        <i class="pe-7s-users"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">{{ DB::table('pharmaciens')->count()}}</span></div>
                            <div class="stat-heading">Nombre pharmacien</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<br><br>

<h1 style="text-align:center; color:#fff;  font-weight: bold; text-shadow: 0px 10px 10px rgba(0, 0, 0, 2);"> Bienvenu dans espace pharmacien<h1>