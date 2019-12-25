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

    <title>Camera Request</title>

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
                      <span class="section">Unplaced Booking Request</span>
                    <div class="row">

                    <div class="table-responsive">
                     <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px;">Sr.No</th>
                          <th>Name</th>
                          <th>Mobile No</th>
                          <th>E-mail</th>
                          <th>Start Date / Time</th>
                        
                          <th>Booking Info</th>
                        <!--  <th>Action</th> -->
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                      include('config.php');
                     

                    $sql ="SELECT *,u.user_id,u.id, 
                              DATE_FORMAT(u.start_date,'%d-%m-%Y') AS 'start_date',
                              DATE_FORMAT(u.start_time,'%h:%i %p') AS 'start_time',
                              DATE_FORMAT(u.end_time,'%h:%i %p') AS 'end_time' FROM
                              photo_user_details u LEFT OUTER JOIN orders o ON (u.id = o.photo_details_id) WHERE o.photo_details_id IS NULL   order by u.id desc";
                      
                      $result = mysqli_query($conn, $sql);
                      $return=mysqli_num_rows($result);
                      
                      if($return > 0)
                      {
                          $count = 0;

                       while($row = mysqli_fetch_assoc($result)) 
                        { 

                            $uid = $row['user_id'];

                            $sql1 = "SELECT name,email from end_users where id=".$uid."";
                            $result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_assoc($result1);

                          
                            $count++;
                      ?>
                        <tr>
                          <td><?php echo $count ?></td>
                          <td><?php echo $row1['name']; ?></td>
                          <td><?php  echo $row['mobile1']?></td>
                          <td><?php  echo $row1['email']?></td>
                          <td><?php  echo $row['start_date']?> | <?php  echo $row['start_time']?> TO <?php  echo $row['end_time']?> </td>
                         
                          <td>
                           <a href="view_unplaced_booking_order.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-xs" value="">View</a>
                         </td>
                          
                    <!--  <td>
                             
                          <form action="RentStatus.php" method="POST" onSubmit="if(!confirm('Are you sure ?')){return false;}" novalidate>
                          
                          <?php if($status==null) {  ?>
                            
                          <button class="btn btn-primary btn-xs" value="<?php echo $row['id']; ?>" name="verify">Verify</button>
                          <button class="btn btn-danger btn-xs" value="<?php echo $row['id'];?>" name="reject">Reject</button>

                          <?php }else if($status==1){ ?> 
                          
                          <button class="btn btn-success btn-xs" disabled="disabled">Verified</button>
                          <button class="btn btn-danger btn-xs" value="<?php echo $row['id'];?>" name="reject">Reject</button>
                        
                           <?php } else if($status==0){ ?> 
                         
                          <button class="btn btn-primary btn-xs" value="<?php echo $row['id'];?>" name="verify">Verify</button>
                          <button class="btn btn-danger btn-xs" disabled="disabled">Rejected</button>
                            
                           <?php } ?>
                            
                       </form>


                        </td> -->
                  </tr>

                        <?php } }?>   

                       
                      </tbody>
                    </table>
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