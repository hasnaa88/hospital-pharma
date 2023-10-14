<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<!--------------------------CSS---------------------------------------------------->
<link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
<link rel="shortcut icon" href="{{asset('css3/images/medicine.png')}}">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">


<link rel="stylesheet" href="{{asset('assets2/css/cs-skin-elastic.css')}}">
<link rel="stylesheet" href="{{ asset('assets2/css/style.css') }}">
<link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

<style>
#weatherWidget .currentDesc {
    color: #ffffff!important;
}
    .traffic-chart {
        min-height: 335px;
    }
    #flotPie1  {
        height: 150px;
    }
    #flotPie1 td {
        padding:3px;
    }
    #flotPie1 table {
        top: 20px!important;
        right: -10px!important;
    }
    .chart-container {
        display: table;
        min-width: 270px ;
        text-align: left;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    #flotLine5  {
         height: 105px;
    }

    #flotBarChart {
        height: 150px;
    }
    #cellPaiChart{
        height: 160px;
    }

</style>





<!------------------------------------------------------------------------------------------->
</head>
<body>
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
                        <li><i class="menu-icon fa fa-th"></i><a href="">gestion des commandes</a></li>
                        
                
                        
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
 <!-- Right Panel -->
 <div id="right-panel" class="right-panel">
  <!-- Header-->
 <header id="header" class="header " >
  <div class="top-left" >
      <div class="navbar-header ">
          <a class="navbar-brand" style="color:#ff9966; font-weight: bold;"   href="./">HOSPITAL PHARMACY</a>
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
               {{ Auth::guard('fournisseur')->user()->name }}
      
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

<div class="content">
    <div class="pull-right">
        <a class="btn btn-primary mt-1 mr-0" href="{{ route('fournisseur.home') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    </div>
  <div class=" p-3">
     
    <h2 style="color:#ff9966">Liste des pharmaciens</h2>


</div>
  <div class="orders">
    <div class="row">
      <div class="col-xl-12">
        <div class="card" style="border:solid 3px #ff9966">
          <div class="card-body">
            <h4 class="box-title">Liste des pharmaciens </h4>
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table ">
                <thead>
                  <tr>
                    <th class="serial">id</th>
                    <th class="serial">nom</th>
                    <th class="avatar">email</th>
                    <th class="avatar">téléphone</th>
                 
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($pharmacien as $pha)
                    <tr>
                     
                     
                      <td>  <span class="name">{{$pha->id}}</span> </td>
                      <td>  <span class="name">{{$pha->name}}</span> </td>
                      <td>  <span class="name">{{$pha->email}}</span> </td>
                      <td>  <span class="name">{{$pha->telephone}}</span> </td>
                     
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
<!----------------------------------JAVASCRIPT----------------------------------------------->    
 







</div>
    <!-------------------------------------------->
   

    <div class="clearfix"></div>

<!---------------------------------JAVASCRIPT -------------------------------->



<script src="{{ asset('css3/js/jquery-3.3.1.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="{{ asset('css3/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('css3/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets2/js/main.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script src="{{ asset('css3/assets/js/init/fullcalendar-init.js') }}"></script>

<!--Local Stuff-->
<script>

    jQuery(document).ready(function($) {
        "use strict";

        // Pie chart flotPie1
        var piedata = [
            { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
            { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
            { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
        ];

        $.plot('#flotPie1', piedata, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.65,
                    label: {
                        show: true,
                        radius: 2/3,
                        threshold: 1
                    },
                    stroke: {
                        width: 0
                    }
                }
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });
        // Pie chart flotPie1  End
        // cellPaiChart
        var cellPaiChart = [
            { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
            { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
        ];
        $.plot('#cellPaiChart', cellPaiChart, {
            series: {
                pie: {
                    show: true,
                    stroke: {
                        width: 0
                    }
                }
            },
            legend: {
                show: false
            },grid: {
                hoverable: true,
                clickable: true
            }

        });
        // cellPaiChart End
        // Line Chart  #flotLine5
        var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

        var plot = $.plot($('#flotLine5'),[{
            data: newCust,
            label: 'New Data Flow',
            color: '#fff'
        }],
        {
            series: {
                lines: {
                    show: true,
                    lineColor: '#fff',
                    lineWidth: 2
                },
                points: {
                    show: true,
                    fill: true,
                    fillColor: "#ffffff",
                    symbol: "circle",
                    radius: 3
                },
                shadowSize: 0
            },
            points: {
                show: true,
            },
            legend: {
                show: false
            },
            grid: {
                show: false
            }
        });
        // Line Chart  #flotLine5 End
        // Traffic Chart using chartist
        if ($('#traffic-chart').length) {
            var chart = new Chartist.Line('#traffic-chart', {
              labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
              series: [
              [0, 18000, 35000,  25000,  22000,  0],
              [0, 33000, 15000,  20000,  15000,  300],
              [0, 15000, 28000,  15000,  30000,  5000]
              ]
          }, {
              low: 0,
              showArea: true,
              showLine: false,
              showPoint: false,
              fullWidth: true,
              axisX: {
                showGrid: true
            }
        });

            chart.on('draw', function(data) {
                if(data.type === 'line' || data.type === 'area') {
                    data.element.animate({
                        d: {
                            begin: 2000 * data.index,
                            dur: 2000,
                            from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                            to: data.path.clone().stringify(),
                            easing: Chartist.Svg.Easing.easeOutQuint
                        }
                    });
                }
            });
        }
        // Traffic Chart using chartist End
        //Traffic chart chart-js
        if ($('#TrafficChart').length) {
            var ctx = document.getElementById( "TrafficChart" );
            ctx.height = 150;
            var myChart = new Chart( ctx, {
                type: 'line',
                data: {
                    labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                    datasets: [
                    {
                        label: "Visit",
                        borderColor: "rgba(4, 73, 203,.09)",
                        borderWidth: "1",
                        backgroundColor: "rgba(4, 73, 203,.5)",
                        data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                    },
                    {
                        label: "Bounce",
                        borderColor: "rgba(245, 23, 66, 0.9)",
                        borderWidth: "1",
                        backgroundColor: "rgba(245, 23, 66,.5)",
                        pointHighlightStroke: "rgba(245, 23, 66,.5)",
                        data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                    },
                    {
                        label: "Targeted",
                        borderColor: "rgba(40, 169, 46, 0.9)",
                        borderWidth: "1",
                        backgroundColor: "rgba(40, 169, 46, .5)",
                        pointHighlightStroke: "rgba(40, 169, 46,.5)",
                        data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                    }
                    ]
                },
                options: {
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    }

                }
            } );
        }
        //Traffic chart chart-js  End
        // Bar Chart #flotBarChart
        $.plot("#flotBarChart", [{
            data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
            bars: {
                show: true,
                lineWidth: 0,
                fillColor: '#ffffff8a'
            }
        }], {
            grid: {
                show: false
            }
        });
        // Bar Chart #flotBarChart End
    });
</script>




<!-------------------------------end javascript------------------------------------------------>

 
</body>
</html>


