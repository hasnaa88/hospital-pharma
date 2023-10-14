<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('medecin.home')}}"><i class="menu-icon fa fa-laptop"></i>Medecin Dashboard </a>
                </li>
                <li class="menu-title">UI elements</li><!-- /.menu-title -->
          
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Ordonnances</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('ordonnance.index')}}">Gestion des ordonnances</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{url('/ordonnance/listOrd')}}">Afficher la liste des ordonnances</a></li>    
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Patient</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('patient.index')}}">gestion des patient</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{url('/patient/listPatient')}}">Info sur patients</a></li>
                   

                    </ul>
                </li>
<!-------
                <li class="menu-item-has-children dropdown">
                    <a href="{{url('/dashboard/medecin/profile')}}"> <i class="menu-icon fa fa-th"></i>profile</a>
                    
                </li>

       ------->        
                
            </ul>
 
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
