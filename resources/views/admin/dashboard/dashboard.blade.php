@extends('admin.app')
@section('content')

<body class="">
    <div class="wrapper ">
      <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('images/sidebar-1.jpg')}}">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
  
          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Admin Panel
          </a></div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item active  ">
              <a class="nav-link" href="./dashboard.html">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{route('admin.category.index')}}">
                <i class="material-icons">person</i>
                <p>Categories</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{route('admin.products.index')}}">
                <i class="material-icons">content_paste</i>
                <p>Products</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{route('admin.pharmacies.index')}}">
                <i class="material-icons">library_books</i>
                <p>Pharmacies</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="./icons.html">
                <i class="material-icons">bubble_chart</i>
                <p>Logout</p>
              </a>
            </li>

          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <a class="navbar-brand" href="javascript:;">Dashboard</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
           
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="javascript:;">
                    <i class="material-icons">dashboard</i>
                    <p class="d-lg-none d-md-block">
                      Stats
                    </p>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">notifications</i>
                    <span class="notification">5</span>
                    <p class="d-lg-none d-md-block">
                      Some Actions
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Mike John responded to your email</a>
                    <a class="dropdown-item" href="#">You have 5 new tasks</a>
                    <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                    <a class="dropdown-item" href="#">Another Notification</a>
                    <a class="dropdown-item" href="#">Another One</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">person</i>
                    <p class="d-lg-none d-md-block">
                      Account
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Log out</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">content_copy</i>
                    </div>
                    <p class="card-category">Categories</p>
                    <h3 class="card-title">{{count($categories)}}
                   
                    </h3>
                  </div>
                  <div class="card-footer">
                    {{-- <div class="stats">
                      <i class="material-icons text-danger">warning</i>
                      <a href="javascript:;">Get More Space...</a>
                    </div> --}}
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">store</i>
                    </div>
                    <p class="card-category">Pharmacies</p>
                    <h3 class="card-title">{{count($pharmacies)}}</h3>
                  </div>
                  <div class="card-footer">
                   
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">info_outline</i>
                    </div>
                    <p class="card-category">Products</p>
                    <h3 class="card-title">{{count($products)}}</h3>
                  </div>
                  <div class="card-footer">

                  </div>
                </div>
              </div>
              {{-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="fa fa-twitter"></i>
                    </div>
                    <p class="card-category">Followers</p>
                    <h3 class="card-title">+245</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> Just Updated
                    </div>
                  </div>
                </div>
              </div> --}}
            </div>
            
            
          </div>
        </div>
        <footer class="footer">
          <div class="container-fluid">
            <nav class="float-left">
              <ul>
                <li>
                  <a href="https://www.creative-tim.com">
                    PromptPharma
                  </a>
                </li>
                <li>
                  <a href="https://creative-tim.com/presentation">
                    About Us
                  </a>
                </li>
                <li>
                  <a href="http://blog.creative-tim.com">
                    Blog
                  </a>
                </li>
                <li>
                  <a href="https://www.creative-tim.com/license">
                    Licenses
                  </a>
                </li>
              </ul>
            </nav>
            <div class="copyright float-right">
              &copy;
              <script>
                document.write(new Date().getFullYear())
              </script>, PromptPharma</i> 
            </div>
          </div>
        </footer>
      </div>
    </div>
        <!--   Core JS Files   -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-material-design.min.js')}}"></script>
    <script src="{{asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!-- Plugin for the momentJs  -->
    <script src="{{asset('js/moment.min.js')}}"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="{{asset('js/sweetalert2.js')}}"></script>
    <!-- Forms Validations Plugin -->
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="{{asset('js/jquery.bootstrap-wizard.js')}}"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{asset('js/bootstrap-selectpicker.js')}}"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{asset('js/jasny-bootstrap.min.js')}}"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="{{asset('js/fullcalendar.min.js')}}"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="{{asset('js/jquery-jvectormap.js')}}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{asset('js/nouislider.min.js')}}"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="{{asset('js/arrive.min.js')}}"></script>
    <!-- Chartist JS -->
    <script src="{{asset('js/chartist.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('js/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('js/material-dashboard.js?v=2.1.2')}}" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->

    <script>
      $(document).ready(function() {
        $().ready(function() {
          $sidebar = $('.sidebar');
  
          $sidebar_img_container = $sidebar.find('.sidebar-background');
  
          $full_page = $('.full-page');
  
          $sidebar_responsive = $('body > .navbar-collapse');
  
          window_width = $(window).width();
  
          fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();
  
          if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
            if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
              $('.fixed-plugin .dropdown').addClass('open');
            }
  
          }
  
          $('.fixed-plugin a').click(function(event) {
            // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
            if ($(this).hasClass('switch-trigger')) {
              if (event.stopPropagation) {
                event.stopPropagation();
              } else if (window.event) {
                window.event.cancelBubble = true;
              }
            }
          });
  
          $('.fixed-plugin .active-color span').click(function() {
            $full_page_background = $('.full-page-background');
  
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
  
            var new_color = $(this).data('color');
  
            if ($sidebar.length != 0) {
              $sidebar.attr('data-color', new_color);
            }
  
            if ($full_page.length != 0) {
              $full_page.attr('filter-color', new_color);
            }
  
            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.attr('data-color', new_color);
            }
          });
  
          $('.fixed-plugin .background-color .badge').click(function() {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
  
            var new_color = $(this).data('background-color');
  
            if ($sidebar.length != 0) {
              $sidebar.attr('data-background-color', new_color);
            }
          });
  
          $('.fixed-plugin .img-holder').click(function() {
            $full_page_background = $('.full-page-background');
  
            $(this).parent('li').siblings().removeClass('active');
            $(this).parent('li').addClass('active');
  
  
            var new_image = $(this).find("img").attr('src');
  
            if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
              $sidebar_img_container.fadeOut('fast', function() {
                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                $sidebar_img_container.fadeIn('fast');
              });
            }
  
            if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
              var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
  
              $full_page_background.fadeOut('fast', function() {
                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                $full_page_background.fadeIn('fast');
              });
            }
  
            if ($('.switch-sidebar-image input:checked').length == 0) {
              var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
              var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
  
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            }
  
            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
            }
          });
  
          $('.switch-sidebar-image input').change(function() {
            $full_page_background = $('.full-page-background');
  
            $input = $(this);
  
            if ($input.is(':checked')) {
              if ($sidebar_img_container.length != 0) {
                $sidebar_img_container.fadeIn('fast');
                $sidebar.attr('data-image', '#');
              }
  
              if ($full_page_background.length != 0) {
                $full_page_background.fadeIn('fast');
                $full_page.attr('data-image', '#');
              }
  
              background_image = true;
            } else {
              if ($sidebar_img_container.length != 0) {
                $sidebar.removeAttr('data-image');
                $sidebar_img_container.fadeOut('fast');
              }
  
              if ($full_page_background.length != 0) {
                $full_page.removeAttr('data-image', '#');
                $full_page_background.fadeOut('fast');
              }
  
              background_image = false;
            }
          });
  
          $('.switch-sidebar-mini input').change(function() {
            $body = $('body');
  
            $input = $(this);
  
            if (md.misc.sidebar_mini_active == true) {
              $('body').removeClass('sidebar-mini');
              md.misc.sidebar_mini_active = false;
  
              $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();
  
            } else {
  
              $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');
  
              setTimeout(function() {
                $('body').addClass('sidebar-mini');
  
                md.misc.sidebar_mini_active = true;
              }, 300);
            }
  
            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function() {
              window.dispatchEvent(new Event('resize'));
            }, 180);
  
            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function() {
              clearInterval(simulateWindowResize);
            }, 1000);
  
          });
        });
      });
    </script>
    <script>
      $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();
  
      });
    </script>
  </body>
  
@endsection