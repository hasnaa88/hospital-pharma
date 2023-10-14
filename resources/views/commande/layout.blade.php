<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
   @include('dashboard.backend_pharmacien.partials.css')
</head>

<body>
    <!-- Left Panel -->
  @include('dashboard.backend_pharmacien.partials.aside')
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
          <div class="top-left">
              <div class="navbar-header">
                  <a class="navbar-brand" href="./">HOSPITAL PHARMACY</a>
                  <a class="navbar-brand hidden" href="./">HOSPITAL PHARMACY</a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
              </div>
          </div>
          
          <div class="top-right">
              <div class="header-menu">
                  <div class="header-left">
                      <button class="search-trigger"><i class="fa fa-search"></i></button>
                      <div class="form-inline">
                          <form class="search-form">
                              <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                              <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                          </form>
                      </div>
      
      
            
                  </div>
      
                  <div class="user-area dropdown float-right">
                      <a href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         {{ Auth::guard('pharmacien')->user()->name }}
                         
                      </a>
      
                      <div class="user-menu dropdown-menu">
      
                        @guest
                         
                            <li class="nav-item dropdown">
                              
                  


                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
      
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                        @endguest
      
                      </div>
      
                  </div>
      
              </div>
          </div>
      
      </header>
      
        <!-- /#header -->
        <!-- All Information  -->
         <div class="content">
       
     
        <!-- /All Information -->
        <!-- Content -->
        @yield('content')
          </div>
        <!-- /.content -->
        <div class="clearfix"></div>

        <!-- Footer -->
        @include('dashboard.backend_pharmacien.partials.footer')
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
  @include('dashboard.backend_pharmacien.partials.scripts')
  @yield('footer_scripts')
</body>
</html>
