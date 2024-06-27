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
                  <!-- Top Statistics -->
                  <div class="row">

                    <div class="col-xl-4 col-sm-6">
                      <div class="card card-default card-mini mb-5">
                        <div class="card-header">
                          <h2><?php echo get_total_products() ?></h2>
                          <div class="sub-title">
                            <span class="mr-1">Total Products</span> 
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-sm-6">
                        <div class="card card-default card-mini mb-5">
                          <div class="card-header">
                            <h2><?php echo get_total_stock() ?></h2>
                            <div class="sub-title">
                              <span class="mr-1">Total Items in Stock</span> 
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6">
                        <div class="card card-default card-mini mb-5">
                          <div class="card-header">
                            <h2><?php echo get_total_scans() ?></h2>
                            <div class="sub-title">
                              <span class="mr-1">QR Scans</span> 
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>


                <!-- Table Product -->
                <div class="row">
                  <div class="col-12">
                    <div class="card card-default">
                      <div class="card-header">
                        <h2>Products</h2>
                        <div class="dropdown">
                            <a href="/add-product" class="btn btn-primary">
                                <i class=" mdi mdi-star-outline mr-1"></i>
                                Add New
                            </a>
                        </div>
                      </div>
                      <div class="card-body">
                        <table id="productsTable" class="table table-responsive table-hover table-product" style="width:100%">
                          <thead>
                            <tr>
                              <th></th>
                              <th>ID</th>
                              <th>Product Name</th>
                              <th>Cost Price</th>
                              <th>Selling Price</th>
                              <th>Discounted Price</th>
                              <th>Stock</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>



                            <?php foreach($products as $product): ?>
                            <tr>
                              <td class="py-0">
                                <img src="<?php echo $product['qr_code_data'] ?>" alt="QR Image">
                              </td>
                              <td><?php echo $product['product_id'] ?></td>
                              <td><?php echo $product['product_name'] ?></td>
                              <td><sup>GHS</sup> <?php echo $product['cost_price'] ?></td>
                              <td><sup>GHS</sup> <?php echo $product['selling_price'] ?></td>
                              <td><sup>GHS</sup> <span class="font-weight-bold"><?php echo $product['discounted_price'] ?></span> <small class="font-weight-bold text-danger"> <?php echo calculateDiscount($product['selling_price'], $product['discounted_price']) ?>%</small></td>
                              <td><?php echo $product['stock'] ?></td>
                              <td>
                                <div class="dropdown">
                                  <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                  </a>

                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="/edit-product?id=<?php echo $product['product_id'] ?>">Edit</a>
                                    <a class="dropdown-item" href="/delete-product?id=<?php echo $product['product_id'] ?>">Delete</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <?php endforeach; ?>


                          </tbody>
                        </table>

                        <a class="d-block mt-3" href="/products">See all items</a>

                      </div>
                    </div>
                  </div>
                </div>

              

              <!-- Stock Modal -->
              <div class="modal fade modal-stock" id="modal-stock" aria-labelledby="modal-stock" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                  <form action="#">
                    <div class="modal-content">
                      <div class="modal-header align-items-center p3 p-md-5">
                        <h2 class="modal-title" id="exampleModalGridTitle">Add Stock</h2>
                        <div>
                          <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal"> cancel </button>
                          <button type="submit" class="btn btn-primary  btn-pill" data-dismiss="modal"> save </button>
                        </div>

                      </div>
                      <div class="modal-body p3 p-md-5">
                        <div class="row">
                          <div class="col-lg-8">
                            <h3 class="h5 mb-5">Product Information</h3>
                            <div class="form-group mb-5">
                              <label for="new-product">Product Title</label>
                              <input type="text" class="form-control" id="new-product" placeholder="Add Product">
                            </div>
                            <div class="form-row mb-4">
                              <div class="col">
                                <label for="price">Price</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                  </div>
                                  <input type="text" class="form-control" id="price" placeholder="Price" aria-label="Price"
                                    aria-describedby="basic-addon1">
                                </div>
                              </div>
                              <div class="col">
                                <label for="sale-price">Sale Price</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                  </div>
                                  <input type="text" class="form-control" id="sale-price" placeholder="Sale Price" aria-label="SalePrice"
                                    aria-describedby="basic-addon1">
                                </div>
                              </div>
                            </div>

                            <div class="product-type mb-3 ">
                              <label class="d-block" for="sale-price">Product Type <i class="mdi mdi-help-circle-outline"></i> </label>
                              <div>

                                <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                  <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="checked">
                                  <label class="custom-control-label" for="customRadio1">Physical Good</label>
                                </div>

                                <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                  <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadio2">Digital Good</label>
                                </div>

                                <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                  <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadio3">Service</label>
                                </div>

                              </div>
                            </div>

                            <div class="editor">
                              <label class="d-block" for="sale-price">Description <i class="mdi mdi-help-circle-outline"></i></label>
                              <div id="standalone">
                                <div id="toolbar">
                                  <span class="ql-formats">
                                    <select class="ql-font"></select>
                                    <select class="ql-size"></select>
                                  </span>
                                  <span class="ql-formats">
                                    <button class="ql-bold"></button>
                                    <button class="ql-italic"></button>
                                    <button class="ql-underline"></button>
                                  </span>
                                  <span class="ql-formats">
                                    <select class="ql-color"></select>
                                  </span>
                                  <span class="ql-formats">
                                    <button class="ql-blockquote"></button>
                                  </span>
                                  <span class="ql-formats">
                                    <button class="ql-list" value="ordered"></button>
                                    <button class="ql-list" value="bullet"></button>
                                    <button class="ql-indent" value="-1"></button>
                                    <button class="ql-indent" value="+1"></button>
                                  </span>
                                  <span class="ql-formats">
                                    <button class="ql-direction" value="rtl"></button>
                                    <select class="ql-align"></select>
                                  </span>
                                </div>
                              </div>
                              <div id="editor"></div>

                              <div class="custom-control custom-checkbox d-inline-block mt-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                <label class="custom-control-label" for="customCheck2">Hide product from published site</label>
                              </div>

                            </div>

                          </div>
                          <div class="col-lg-4">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" placeholder="please imgae here">
                              <span class="upload-image">Click here to <span class="text-primary">add product image.</span> </span>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </form>
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
    
                    <!-- Card Offcanvas -->
                    <div class="card card-offcanvas" id="contact-off" >
                      <div class="card-header">
                        <h2>Contacts</h2>
                        <a href="#" class="btn btn-primary btn-pill px-4">Add New</a>
                      </div>
                      <div class="card-body">

                        <div class="mb-4">
                          <input type="text" class="form-control form-control-lg form-control-secondary rounded-0" placeholder="Search contacts...">
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-01.jpg" alt="User Image">
                              <span class="active bg-primary"></span>
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Selena Wagner</span>
                              <span class="discribe">Designer</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-02.jpg" alt="User Image">
                              <span class="active bg-primary"></span>
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Walter Reuter</span>
                              <span>Developer</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-03.jpg" alt="User Image">
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Larissa Gebhardt</span>
                              <span>Cyber Punk</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-04.jpg" alt="User Image">
                            </a>

                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Albrecht Straub</span>
                              <span>Photographer</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-05.jpg" alt="User Image">
                              <span class="active bg-danger"></span>
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Leopold Ebert</span>
                              <span>Fashion Designer</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-06.jpg" alt="User Image">
                              <span class="active bg-primary"></span>
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Selena Wagner</span>
                              <span>Photographer</span>
                            </a>
                          </div>
                        </div>

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



