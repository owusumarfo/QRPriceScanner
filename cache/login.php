<?php class_exists('Template') or exit; ?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title><?php echo $title ?></title>

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
		

<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
  <div class="d-flex flex-column justify-content-between">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <div class="card card-default mb-0">
          <div class="card-header pb-0">
            <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
              <a class="w-auto pl-0" href="/login">
                <img src="img/abc-logo.png" alt="ABC Retail">
                <span class="d-none brand-name text-dark">ABC Retail</span>
              </a>
            </div>
          </div>
          <div class="card-body px-5 pb-5 pt-0">

            <h4 class="text-dark mb-6 text-center">Sign in</h4>
            <div class="text-danger"> <?php echo $login_error ?? '' ?> </div>

            <form action="" method="POST">
              <div class="row">
                <div class="form-group col-md-12 mb-4">
                  <input type="text" class="form-control input-lg" id="email" aria-describedby="emailHelp"
                    placeholder="username" name="username">
                </div>
                <div class="form-group col-md-12 ">
                  <input type="password" class="form-control input-lg" id="password" placeholder="password" name="password">
                </div>
                <div class="col-md-12">

                  <div class="d-flex justify-content-between mb-3">

                    <div class="d-none custom-control custom-checkbox mr-3 mb-3">
                      <input type="checkbox" class="custom-control-input" id="customCheck2">
                      <label class="custom-control-label" for="customCheck2">Remember me</label>
                    </div>

                    <!-- <a class="text-color" href="#"> Forgot password? </a> -->

                  </div>

                  <button type="submit" class="m-auto d-block btn btn-primary btn-pill mb-4">Login</button>

                  <p class="d-none">Don't have an account yet ?
                    <a class="text-blue" href="sign-up.html">Sign Up</a>
                  </p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


	</body>
</html>





