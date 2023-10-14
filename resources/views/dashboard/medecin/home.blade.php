<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
   @include('dashboard.backend_medecin.partials.css')
</head>

<body>
    <!-- Left Panel -->
  @include('dashboard.backend_medecin.partials.aside')
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
          <div class="top-left">
              <div class="navbar-header">
                  <a class="navbar-brand" style="color:#2D88FF; font-weight: bold;"  href="./">HOSPITAL PHARMACY</a>
                  <a class="navbar-brand hidden" href="./">HOSPITAL PHARMACY</a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
              </div>
          </div>
          <div class="top-right">
              <div class="header-menu">
                  <div class="header-left">
                      
      
                   
      
                  </div>
      
                  <div class="user-area dropdown float-right">
                      <a href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         {{ Auth::guard('medecin')->user()->name }}
                
                      </a>
      
                      <div class="user-menu dropdown-menu">
      
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
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
            <style>

                .content {
                  float: left;
                  background-color: #74acf5;
                  padding: 1.875em;
                  height:90vh ;
                  width: 100%; }
                             </style>
        @include('dashboard.backend_medecin.partials.allamount')
        <!-- /All Information -->
        <!-- Content -->
        @yield('content')
          </div>
        <!-- /.content -->
        <div class="clearfix"></div>

        <!-- Footer -->
        @include('dashboard.backend_medecin.partials.footer')
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
  @include('dashboard.backend_medecin.partials.scripts')
  @yield('footer_scripts')
</body>
</html>
