<?php class_exists('Template') or exit; ?>
<!DOCTYPE html>

<html lang="en">
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

</head>
  	<body class="bg-light-gray" id="body">
		


<?php
  if(!isset($product['product_name'])):
?>

<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
  <div class="d-flex flex-column justify-content-between">
    <div class="row justify-content-center mt-5">
      <div class="col-md-10">
        <div class="card card-default">
          <div class="card-header pb-0">
            <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
              <a class="w-auto pl-0" href=".">
                <img src="img/abc-logo.png" alt="ABC Retail">
              </a>
            </div>
          </div>
          <div class="card-body px-7 py-3 text-center">
            <h3 class="text-dark mb-3 text-dark">Oops!</h3>
            <p class="mb-4">Sorry. Item no longer exists. Please scan another.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  else:
?>

<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
  <div class="d-flex flex-column justify-content-between">
    <div class="row justify-content-center mt-5">
      <div class="col-md-10">
        <div class="card card-default">
          <div class="card-header pb-0">
            <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
              <a class="w-auto pl-0" href=".">
                <img src="img/abc-logo.png" alt="ABC Retail">
              </a>
            </div>
          </div>
          <div class="card-body px-7 py-3 text-center">
            <h5 class="text-dark mb-6 text-dark"><?php echo $product['product_name'] ?></h5>
            <h2 class="font-weight-bold text-primary"><?php echo itemWithDiscount($product['selling_price'], $product['discounted_price']) ?></h2>
            <div class="bg-danger d-inline-block font-weight-bold h5 py-2 rounded-circle text-white" style="width:45px; height:45px;"> <?php echo calculateDiscount($product['selling_price'], $product['discounted_price']) ?>% </div>
            <p class="pt-5 small">Thanks for scanning.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  endif;
?>





	</body>
</html>



