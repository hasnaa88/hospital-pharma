

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card" style=" box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);height: 120px">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-1">
                        <i class="fa fa-shopping-cart"></i> 
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">{{ DB::table('commandes')->count()}}</span></div>
                            <div class="stat-heading">Nombre de commandes </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-3 col-md-6 ">
        <div class="card" style=" box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);height: 120px">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-2">
                        <i class="pe-7s-users"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">{{ DB::table('medecins')->count()}}</span></div>
                            <div class="stat-heading">Nombre de medecin </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 ">
        <div class="card" style=" box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);height: 120px">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-3">
                        <i class="pe-7s-users"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">{{ DB::table('fournisseurs')->count()}}</span></div>
                            <div class="stat-heading">Nombre de fournisseurs </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 ">
        <div class="card" style=" box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);height: 120px">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-4">
                        <i class="pe-7s-users"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">{{ DB::table('pharmaciens')->count()}}</span></div>
                            <div class="stat-heading">Nombre de pharmacien </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<br><br>

<h1 style="text-align:center; color:#fff;  font-weight: bold; text-shadow: 0px 10px 10px rgba(0, 0, 0, 2);"> Bienvenu dans espace fournisseur<h1>


