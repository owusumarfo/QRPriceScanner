<?php class_exists('Template') or exit; ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title> <?php echo $title ?> </title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />
  
  <link href="plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" />
  
  <link href="plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  
  <link href="plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
  
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  
  <link href="plugins/toaster/toastr.min.css" rel="stylesheet" />
  
  <!-- CSS -->
  <link id="main-css-href" rel="stylesheet" href="css/style.css" />
  <link id="abc-css-href" rel="stylesheet" href="css/abc.css" />

  <!-- FAVICON -->
  <link href="img/abc-favicon.png" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="plugins/nprogress/nprogress.js"></script>
</head>

    <body class="navbar-fixed sidebar-fixed" id="body">
        
        <script>
            NProgress.configure({ showSpinner: false });
            NProgress.start();
        </script>
        
        <div id="toaster"></div>

        


    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
      
        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
                <aside class="left-sidebar sidebar-dark" id="left-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="/dashboard">
                <img src="img/abc-logo-white.png" alt="ABC Retail">
                <span class="d-none brand-name">ABC Retail</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-left" data-simplebar style="height: 100%;">
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                
                  <li class="<?php echo $dash_active ?>">
                    <a class="sidenav-item-link" href="/dashboard">
                      <i class="mdi mdi-briefcase-account-outline"></i>
                      <span class="nav-text">Dashboard</span>
                    </a>
                  </li>
                
                  <li class="<?php echo $products_active ?>">
                    <a class="sidenav-item-link" href="/products">
                      <i class="mdi mdi-chart-line"></i>
                      <span class="nav-text">Products</span>
                    </a>
                  </li>  
                
                  <li class="d-none section-title">
                    Apps
                  </li>

                  <li class="<?php echo $scans_active ?>"> 
                    <a class="sidenav-item-link" href="/scans">
                      <i class="mdi mdi-wechat"></i>
                      <span class="nav-text">QR Scans</span>
                    </a>
                  </li>       
                
              </ul>

            </div>

            <div class="sidebar-footer">
              <div class="sidebar-footer-content">
                <div class="p-2 text-white"> &copy;<?php echo date('Y') ?></div>
              </div>
            </div>
          </div>
        </aside>

      <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
      <div class="page-wrapper">
        
          <!-- Header -->
          <header class="main-header" id="header">
            <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>

              <span class="page-title"> <?php echo $page_title ?> </span>

              <div class="navbar-right ">

                <ul class="nav navbar-nav">

                  <!-- Offcanvas -->

                  <!-- User Account -->
                  <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                      <img src="img/user-icon.png" class="user-image rounded-circle" alt="User" />
                      <span class="d-none d-lg-inline-block"> <?php echo $_SESSION['full_name'] ?> </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li class="p-2">
                          <span class=""> Welcome, <?php echo $_SESSION['full_name'] ?> </span>
                      </li>

                      <li class="dropdown-footer mt-0">
                        <a class="dropdown-link-item justify-content-start" href="?logout=true"> <i class="mdi mdi-logout"></i> Log Out </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>


          </header>

        <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
        <div class="content-wrapper">
            <div class="content">                
                
                <!-- Table Product -->
                <div class="row">
                  <div class="col-12">

                    <?php if($delete_message): ?>
                    <div class="alert alert-success py-5 h3alert-dismissible fade show" role="alert">
                      <?php echo $delete_message ?? '' ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php endif; ?>
                    
                    <a href="/products" class="h5 text-primary">See all Products &rsaquo;</a>

                  </div>
                </div>


            </div>
          
        </div>
        
          <!-- Footer -->
          <footer class="footer mt-auto">
            <div class="copyright bg-white">
              <p>
                &copy;<span id="copy-year"></span> ABC Retail</a>.
              </p>
            </div>
            <script>
                var d = new Date();
                var year = d.getFullYear();
                document.getElementById("copy-year").innerHTML = year;
            </script>
          </footer>

      </div>

    </div>
    





        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="plugins/simplebar/simplebar.min.js"></script>
        <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
        
        <script src="plugins/apexcharts/apexcharts.js"></script>
        
        <script src="plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>

        <script src="plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>

        <script src="plugins/daterangepicker/moment.min.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <script>
          jQuery(document).ready(function() {
            jQuery('input[name="dateRange"]').daterangepicker({
            autoUpdateInput: false,
            singleDatePicker: true,
            locale: {
              cancelLabel: 'Clear'
            }
          });
            jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
              jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
            });
            jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
              jQuery(this).val('');
            });
          });
        </script>
        
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        <!-- <script src="plugins/toaster/toastr.min.js"></script> -->

        <script src="js/mono.js"></script>
        <script src="js/chart.js"></script>
        <script src="js/map.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>


