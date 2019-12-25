<?php
  session_start();
  $id =  $_SESSION['id'];
  
  if(!isset($id)){
    header('location:index.php');
   }


$sql1="SELECT * FROM end_users";
$sql2="SELECT * FROM lend_details WHERE ad_active is null and lend_accept=1 and check_stock=1";
$sql3="SELECT * FROM rent_details WHERE ad_verify is null ";
$sql4="SELECT * FROM lend_details WHERE lend_accept=1 and ad_active=1 and check_stock=1";


function test($sql){
  include('config.php');
  $result = mysqli_query($conn,$sql );
  $num_rows = mysqli_num_rows($result);

    if($num_rows>0)
    {
      $eid = $num_rows;
       echo $eid;
    }else{
      $eid = 0;
      echo $eid;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <?php include('header/header.php'); ?>
  
  
  
  
  
  
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">


            <?php include('sidebar/sidebar.php') ?>

        <!-- top navigation -->
         <?php include('topbar/top_navbar.php'); ?>
        <!-- /top navigation -->
     
      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">


            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="margin-top: 57px;">
                  <div class="x_content">
                    <div class="row">


                       <div class="row top_tiles">


            
            <!-- <a href="lend_camera_registration.php"> </a> -->

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user"></i></div>
                  <div class="count"><?php test($sql1) ?></div>
                  <h3>Sign ups</h3>
                  <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
                </div>
              </div>
            


              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <div class="count"><?php test($sql2) ?></div>
                  <h3>Lend Requests</h3>
                  <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <div class="count"><?php test($sql3) ?></div>
                  <h3>Rent Requests</h3>
                  <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php test($sql4) ?></div>
                  <h3>Active Products</h3>
                  <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
                </div>
              </div>
</div>



                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        
      </div>
    </div>
    
   <?php include('footer/footer.php'); ?>

  </body>
</html>