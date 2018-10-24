<?php
    require ('steamauth/steamauth.php');
      require ('steamauth/conf.php');
	# You would uncomment the line beneath to make it refresh the data every time the page is loaded

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Unturned</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#"><?php echo $sitename; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>

            <li class="nav-item active">

              <?php
              if(!isset($_SESSION['steamid'])) {

                  loginbutton(); //login button

              }  else {
                  include ('steamauth/userInfo.php');
                  $var = $steamprofile['personaname'];
                  //Protected content
                  echo "<li class='nav-item'>
                    <a class='nav-link' href='balance.php'>Balance</a>
                  </li>";
                  logoutbutton();
              }
              ?>

          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">Unturned banking script</h1>
          <p class="lead"></p>
          <ul class="list-unstyled">
            <p class="lead">Using:</p>
            <li>Bootstrap 4.1.3</li>
            <li>jQuery 3.3.1</li>
            <?php
if (empty($var)){ echo "Please login to continue"; }else{echo "Welcome back <b>" . $steamprofile['personaname'] . "</B></br>";}

      ?></ul>
        </div>
      </div></div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
