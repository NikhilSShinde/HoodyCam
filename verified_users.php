<?php
  session_start();
  $id =  $_SESSION['id'];
  
  if(!isset($id)){
    header('location:index.php');
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

    <title>Verified Users</title>

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
              <!-- <div class="col-md-12 "> -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="margin-top: 57px;">
                  <div class="x_content">
                     <span class="section">Verified User</span>
                    <div class="row">

                        <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px;">Sr.No</th>
                          <th>Name</th>
                          <th>Mobile No</th>
                          <th>E-mail</th>
                          <th>Start Date / Time</th>
                          <th>End Date / Time </th>
                          
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>

                      <?php
                      include('config.php');
                     
                      $sql=("SELECT r.*, e.name,

                      DATE_FORMAT(start_date,'%d-%m-%Y') AS 'start_date',
                      DATE_FORMAT(start_time,'%h:%i %p') AS 'start_time',
                      DATE_FORMAT(end_date,'%d-%m-%Y') AS 'end_date',
                      DATE_FORMAT(end_time,'%h:%i %p') AS 'end_time'  FROM

                      rent_details r, end_users e WHERE r.user_id=e.id AND ad_verify='1' ORDER BY r.id DESC"); 
                      
                      
                    /*  $sql=" SELECT r.*, e.name,

                      DATE_FORMAT(start_date,'%d-%m-%Y') AS 'start_date',
                      DATE_FORMAT(start_time,'%h:%i %p') AS 'start_time',
                      DATE_FORMAT(end_date,'%d-%m-%Y') AS 'end_date',
                      DATE_FORMAT(end_time,'%h:%i %p') AS 'end_time'  FROM

                       end_users e, rent_details r, orders o, transactions t WHERE r.user_id=e.id AND r.id=o.rent_details_id AND o.id=t.order_id AND ad_verify='1' AND t.order_status is null ORDER BY r.id DESC";  */

                      $result = mysqli_query($conn, $sql);
                      $return=mysqli_num_rows($result);
                      
                      if($return > 0)
                      {
                         $count = 0;

                       while($row = mysqli_fetch_assoc($result)) 
                       { 
                            $count++;
                      ?>
                        <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $row['name']?></td>
                          <td><?php echo $row['mobile1']?></td>
                          <td><?php echo $row['email']?></td>
                          <td><?php echo $row['start_date']?> | <?php echo $row['end_time']?> </td>
                          <td><?php echo $row['start_date']?> | <?php echo $row['end_time']?></td>
                          
                          <td>
                            <a href="view_verified_users.php?id=<?php echo $row['id']?>">
                                <button class="btn btn-warning btn-xs" value="">View</button>
                            </a>
                            <!-- <button class="btn btn-danger btn-xs" value="">Reject</button> -->
                          </td>
                        </tr>
                          
                      <?php }} ?>
                      </tbody>
                    </table>



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