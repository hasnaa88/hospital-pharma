<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('fournisseur.home')}}"><i class="menu-icon fa fa-laptop"></i>fournisseur Dashboard </a>
                </li>
                <li class="menu-title">UI elements</li><!-- /.menu-title -->
          
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>commandes</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{url('/listComFournisseur')}}">gestion des commandes</a></li>
                        
                
                        
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>pharmacien</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{url('/listPharmacien')}}">info sur pharmacien</a></li>
                   

                    </ul>
                </li>
                
                
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
