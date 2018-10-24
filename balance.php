<?php
require ('steamauth/steamauth.php');
require ('steamauth/conf.php');





?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home
              </a>
            </li><a class="nav-link active" href="#">Balance
              <span class="sr-only">(current)</span>
            </a>
          </li>

            <li class="nav-item active">

              <?php
              if(!isset($_SESSION['steamid'])) {

              }  else {
                  include ('steamauth/userInfo.php');
              ?>

          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content --><br>
    <div class="container">
      <div class="row">
        <div class="col-l-6 text-center">
<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM uconomy where steamid = ".$steamprofile['steamid']."";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
<div class="container responsive" style="align-items: center; padding:20%">
    <div class="row">
      <ul class="thumbnails list-unstyled">
        <li class="col-md-6">
          <div class="thumbnail" style="padding: 0">
            <div style="">
              <br><img alt="300x200" src="<?php echo $steamprofile['avatarfull'];?>"><br>
            </div>
<br>
            <div class="caption col-md-6" style="width:100px">
              <h2><?php echo $steamprofile['personaname'];?></h2>
              <p><?php echo $steamprofile['steamid'];?></p><br></div>
              <p><i class="">last Updated:<br></i><br><? echo $row['lastUpdated'];?></p>
            </div>
<div class="col-md-6"><b>Balance</b><br/><small><?php echo "$coinprefix".$row['balance']."$coinsuffix";?></small></div>
<?php

$varr = $row['balance'];


    }
} else {
    echo "Sorry our system could not find your account, please join the server then press this button <a href='balance.php><button>Reee</button></a>";
}
$conn->close();
?>
              </div>
            </div>
            </div>
         <?php
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn1->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM uconomyitemshop where cost <= $varr order by cost asc";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                echo "<br> <br><table class='table table-dark table-striped table-bordered table-hover' border='10'>
<tr>
<th colspan='4'><center>All items you can afford</center></th>
</tr>
<tr>
<th>Image</th>

<th>itemname</th>
<th>item price</th>
<th>id</th>
</tr>";
                while($row = $result->fetch_assoc()) {
?><html>


<?php
                    echo "
                        <tr>
                        <td><img style='width: 40px; height:auto' src='https://unturneditems.com/media/".$row["id"].".png' border='0' height='62' alt='An image for ".$row["itemname"]." not found' /></td>

                          <td style='width:auto; height:auto'>" . $row["itemname"]. "</td>
                          <td style='width:auto; height:auto'>" . $row["cost"]. "</td>
                          <td style='width:auto; height:auto'>" . $row["id"]."</td>
                        </tr>
                      ";
?>




</html>
<?php



                }
            } else {
                echo "You can afford 0 items";
            }
            $conn1->close();


            };



            ?>
          </div>
        </li>
      </ul>
    </div>
</div>


        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
