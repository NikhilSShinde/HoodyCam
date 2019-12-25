<?php
  session_start();
  $id =  $_SESSION['id'];
  
  if(!isset($id)){
    header('location:index.php');
   }

?>

<?php include('config.php');

  $id=$_GET['id'];
  
  $sql= "SELECT *,rc.name AS cat_name, r.email AS email1, 
  DATE_FORMAT(start_date,'%d-%m-%Y') as 'start_date',
  DATE_FORMAT(start_time,'%h:%i %p') as 'start_time',
  DATE_FORMAT(end_date,'%d-%m-%Y') as 'end_date',
  DATE_FORMAT(end_time,'%h:%i %p') as 'end_time' FROM
  rent_details r,rent_lend_categories rc, view_packages v, end_users e WHERE
  r.cat_id=rc.id AND r.package_id=v.p_id AND r.user_id=e.id AND r.id=$id";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $status = $row['ad_verify'];

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>View Rent Request</title>

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
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel" style="margin-top: 57px;">
                  <div class="x_content">
                   
                     <span class="section">Rent Request</span>
                      <form class="form-horizontal form-label-left" novalidate>

               
                    <div class="row">      
                      <div class="item form-group"> 
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Name
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['name']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Mobile Number</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['mobile1']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                      </div>
                        
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">E-Mail</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                         <input type="text" value="<?php echo $row['email1']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Address</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['address']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                       </div>
                        
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Start Date / Time</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" value="<?php echo $row['start_date']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>

                         <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" value="<?php echo $row['start_time']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">End Date / Time</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" value="<?php echo $row['end_date']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" value="<?php echo $row['end_time']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                      </div>


                    <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Package No
                        </label>
                         <div class="col-md-4 col-sm-4 col-xs-12">

                          <input type="text" value="<?php echo $row['package_no']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Category Name</label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['cat_name']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Model Name
                        </label>
                         <div class="col-md-4 col-sm-4 col-xs-12">

                          <input type="text" value="<?php echo $row['model_name']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        
                        
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Adhar Card</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="image view view-first">
                          <?php  
                             if($row['aadhar'] == ""){
                              echo '<img src="assets/images/defaults/no-image.png" style="height: 200px; width: 100%;">';
                                 
                               }else{
                                   
                                  $imgPan = $row['aadhar'];
                                  echo "<img src=\"$imgPan\" style='height:200px; width:320px' class='img-thumnail img-responsive' />";
                                  }
                             ?>
                          </div>
                        </div>
                          
                        
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Pan Card</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <div class="image view view-first">
                          <?php  
                             if($row['pan'] == ""){
                              echo '<img src="assets/images/defaults/no-image.png" style="height: 200px; width: 100%;">';
                                 
                               }else{
                                   
                                  $imgPan = $row['pan'];
                                  echo "<img src=\"$imgPan\" style='height:200px; width:320px' class='img-thumnail img-responsive' />";
                                  }
                             ?>
                          </div>
                        </div>
                      </div>
                        



                    </div>
                  </form>
                      
                      <div class="ln_solid"></div>
                      
                     
                      <div class="form-group">
                        
                        <div class="col-md-6 col-sm-offset-5 col-xs-offset-5">
                         <!--  <form  action="RentStatus.php" onSubmit="if(!confirm('Are you sure ?')){return false;}" method="POST"> 
                           <?php if($status==null) { ?>
                           <button class="btn btn-primary btn-md" value="<?php echo $row['id'];?>" name="verify">Verify</button>
                           <button class="btn btn-danger btn-md" value="<?php echo $id;?>" name="reject">Reject</button>
                          
                          <?php }else if($status==1){ ?> 
                          <button class="btn btn-success btn-md" disabled="disabled">
                          Verified</button>
                          <button class="btn btn-danger btn-md" value="<?php echo $id;?>" name="reject">Reject</button>
                           
                          <?php } else if($status==0){ ?> 
                          <button class="btn btn-primary btn-md" value="<?php echo $id;?>" name="verify">Verify</button>
                            <button class="btn btn-danger btn-md" disabled="disabled">
                            Rejected</button>
                           
                          <?php } ?>
                      
                         </form>  -->
                        <a href="camera_request.php" class="btn btn-warning">Back</a>
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