<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="view/material_kit_design/assets/img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Bakpak - Administrator Login
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="view/admin_design/fontawesome-free/css/all.min.css">
  <!-- CSS Files -->
  <link href="view/material_kit_design/assets/css/material-kit.css?v=2.0.5" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="view/material_kit_design/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html">
          Bakpak <span class="badge badge-pill badge-info">Admin</span></a>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" style="background-image: url('view/material_kit_design/assets/img/background.jpg'); background-size: cover; background-position: top center; font-family: 'Century Gothic';">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" action="controller/user/user.controller.php" method="post">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Admin Login</h4>
              </div>
              <?php if(isset($_GET['Failed_to_login'])){ ?>
		        <div class="alert alert-danger">
		        	<div class="container">
			          <div class="alert-icon">
			            <i class="fas fa-exclamation-circle>"></i>
			          </div>
			          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			            <span aria-hidden="true"><i class="fas fa-times"></i></span>
			          </button>
			          <b>Error Alert:</b> Invalid Credentials!
			        </div>
		        </div>
      		  <?php	} ?>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-user"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="user" placeholder="Username">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-lock"></i>
                    </span>
                  </div>
                  <input type="password" class="form-control" name="pass" placeholder="Password">
                </div>
              </div>
           	  <div class="text-center" style="padding: 30px;"><button type="submit" class="btn btn-primary btn-round btn-block" name="login">Login</button></div>
              <div class="footer text-center">
                <a href="#" class="btn btn-primary btn-link ">Forgot Password?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
        <nav class="float-left">
          <ul>
            <li>
              <a href="#">
                Bakpak
              </a>
            </li>
            <li>
              <a href="#">
                About Us
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, made with <i class="fas fa-heart"></i> by
          <a href="#" target="_blank">Bakpak Inc.</a>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="view/material_kit_design/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="view/material_kit_design/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="view/material_kit_design/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="view/material_kit_design/assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="view/material_kit_design/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="view/material_kit_design/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="view/material_kit_design/assets/js/material-kit.js?v=2.0.5" type="text/javascript"></script>
</body>

</html>