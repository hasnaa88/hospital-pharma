<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('pharmacien.home')}}"  style="color:#41cba9; "><i class="menu-icon fa fa-laptop"  style="color:#41cba9; "></i>Pharmacien Dashboard </a>
                </li>
                <li class="menu-title">UI elements</li><!-- /.menu-title -->
          
                <li class="menu-item-has-children dropdown">
                    <a href="#"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Medicament</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('medicament.index')}}">gestion des medicaments</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{url('/medicament/listMed')}}">afficher la liste des medicament</a></li>
                        
                
                        
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>stock medicament</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('stock.index')}}">Gestion de stock medicament</a></li>
                   

                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Ordonnance A Traité</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{url('/ordonnance/listOrdPharma')}}">liste des ordonnances</a></li>

                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Commande</a>
                    <ul class="sub-menu children dropdown-menu">
                       
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('commande.index')}}">Gestion de commande</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('listCom')}}">liste des commandes</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('ligneCommande.index')}}">Gestion de Ligne Commande</a></li>


                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
