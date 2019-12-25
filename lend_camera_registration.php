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

    <title>Lend Request</title>

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
                      <span class="section">Lend Camera Request's</span>
                    <div class="row">


                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px;">Sr.No</th>
                          <th>Name</th>
                          <th>Mobile No</th>
                          <th>Email</th>
                          <th>Locality</th>
                          <th>Model Name</th>
                          <th>Lender Info</th>
                        <!--  <th>Action</th> -->
                        </tr>
                      </thead>


                      <tbody>

                      <?php
                      include('config.php');
                     
                     // $sql=("SELECT l.*, e.name FROM lend_details l, end_users e where l.user_id=e.id and ad_verify is null order by l.id desc");
                      $sql=("SELECT l.*, e.name FROM lend_details l, end_users e where l.user_id=e.id and ad_verify is null AND lend_accept is null order by l.id desc");   

                      $result = mysqli_query($conn, $sql);
                      $return=mysqli_num_rows($result);
                      
                      if($return > 0)
                      {
                        $count = 0;

                       while($row = mysqli_fetch_assoc($result)) 
                       { 
                          $count++;
                          $status = $row['ad_verify'];
                        ?>

                        <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $row['name']?></td>
                          <td><?php echo $row['mobile1']?></td>
                          <td><?php echo $row['email']?></td>
                          <td><?php echo $row['location']?></td>
                          <td><?php echo $row['model_name'];?></td>
                          <td>
                          <a href="view_lend_registration_request.php?id=<?php echo $row['id'];?>">
                          <button class="btn btn-warning btn-xs" value="">View More</button></a>
                         </td>
                          
                       <!--  <td> 
                       <form action="LendStatus.php" method="POST" onSubmit="if(!confirm('Are you sure ?')){return false;}" novalidate>
                          
                     
                           <?php if($status==null){  ?>

                            <button class="btn btn-primary btn-xs" class="" value="<?php echo $row['id']; ?>" name="verify">Verify</button>
                            <button class="btn btn-danger btn-xs" class="" value="<?php echo $row['id'];?>" name="reject">Reject</button>

                          <?php }else if($status==1){ ?> 
                          
                           <button class="btn btn-success btn-xs" disabled="disabled">Verified</button>
                           <button class="btn btn-danger btn-xs" value="<?php echo $row['id'];
                           ?>" name="reject">Reject</button>
                           
                          <?php } else if($status==0){ ?> 
                            
                            <button class="btn btn-primary btn-xs" class="" value="<?php echo $row['id'];?>" name="verify">Verify</button>
                            <button class="btn btn-danger btn-xs" class="" value="" name="" disabled="disabled">Rejected</button>
                           <?php } ?>


                       </form>  

                          </td> -->
                         
                        </tr>



                        <?php  


                     } }?>   
                       
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