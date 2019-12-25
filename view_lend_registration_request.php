<?php
  session_start();
  $id =  $_SESSION['id'];
  
  if(!isset($id)){
    header('location:index.php');
   }

?>

<?php include('config.php');

  $id=$_GET['id'];

  $sql=("SELECT l.*,e.name,
  DATE_FORMAT(start_date,'%d-%m-%Y') as 'start_date',
  DATE_FORMAT(start_time,'%h:%i %p') AS 'start_time',
  DATE_FORMAT(end_date,'%d-%m-%Y') as 'end_date',
  DATE_FORMAT(end_time,'%h:%i %p') AS 'end_time'
  FROM lend_details l, end_users e where l.user_id=e.id and l.id=$id"); 

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

    <title>View Lend Request</title>

    <?php include('header/header.php'); ?>

    <style type="text/css">
   /* .form-control {
    border: 0;
    background: transparent;
    text-transform: uppercase;
    }*/

    </style>

    <script>
      
      /*$(document).ready(function(){ 
      $("#txtNoSpaces").keydown(function(event) {
        if (event.keyCode == 32) {
        event.preventDefault();
    }
      });
    });*/
    </script>
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
               <div class="row">
                <span class="section">Lend Request</span>
                  
                  <form action="LendStatus.php" method="POST" class="form-horizontal form-label-left"  onSubmit="if(!confirm('Are you sure ?')){return false;}" enctype="multipart/form-data" novalidate>
                    
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">
                        Name</label>
                        
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" name="name" value="<?php  echo $row['name']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                      
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Mobile">Mobile Number</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php  echo $row['mobile1']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                    </div>

                     <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="E-mail">
                        E-mail</label>
                        
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php  echo $row['email']?>"class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                      
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="">Location</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" name="locality" value="<?php  echo $row['location']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                    </div>

                     <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="pin">
                       Pin</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php  echo $row['pincode']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="">
                      Address</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" readonly="readonly"><?php  echo $row['address']?></textarea>
                        </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Model Name</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" name="model_name" id="txtNoSpaces" onpaste="return false;" value="<?php  echo $row['model_name']?>"
                           class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                      
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="">Model Number</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php  echo $row['model_no']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                    </div>

                     <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="">
                        Start Date / Time</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" value="<?php  echo $row['start_date']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                         <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" value="<?php  echo $row['start_time']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                      
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="">End Date / Time</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" value="<?php  echo $row['end_date']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" value="<?php  echo $row['end_time']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                    </div>

                    <div class="item form-group">
                         <label class="control-label col-md-2 col-sm-2 col-xs-12" for="">
                      Damage Description</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" readonly="readonly"><?php  echo $row['dam_desc']?></textarea>
                        </div>
                    </div> 
             </div>   
                    
                    
             <div class="clearfix"></div>    

               <span class="section">Product Image</span>



<!-- media gallery -->

                    <div class="row">
                    

                      <div class="col-md-55">
                          <div class="image view view-first">
                          <?php  
                             if($row['pic'] == ""){
                              echo '<img src="assets/images/defaults/no-image.png" style="height: 200px; width: 200px;">';
                                 
                               }else{
                                   
                                   $imgPan = $row['pic'];
                      echo "<img src=\"$imgPan\" height='200' width='100%' class='img-thumnail'/>
                            <div class='mask'><p>Item Image</p></div>";
                                 
                                  }
                             ?>
                          </div>
                          <!-- <div class="caption">
                            <input type="file" name="image" >
                          </div>-->

                      </div>
                          

                      <div class="col-md-55">
                          <div class="image view view-first">
                          <?php  
                             if($row['bill'] == ""){
                              echo '<img src="assets/images/defaults/no-image.png" style="height: 200px; width: 200px;">';
                                 
                               }else{
                                   // echo '<img src="data:image/jpeg;base64,'.base64_encode($row['bill'] ).'" height="200" width="200" class="img-thumnail" />   '; 
                                  $imgPan = $row['bill'];
                                  echo "<img src=\"$imgPan\" height='200' width='100%' class='img-thumnail' />
                                  <div class='mask'><p>Bill</p></div>";
                                  }
                             ?>
                          </div>
                      </div>

                      <div class="col-md-55">
                          <div class="image view view-first">
                          <?php  
                             if($row['ins'] == ""){
                              echo '<img src="assets/images/defaults/no-image.png" style="height: 200px; width: 200px;">';
                                 
                               }else{
                                   // echo '<img src="data:image/jpeg;base64,'.base64_encode($row['ins'] ).'" height="200" width="200" class="img-thumnail" />   '; 
                                  $imgPan = $row['ins'];
                                  echo "<img src=\"$imgPan\" height='200' width='100%' class='img-thumnail' />
                                  <div class='mask'><p>Insurance</p></div>";
                                  }
                             ?>
                          </div>
                      </div>

                      <div class="col-md-55">
                          <div class="image view view-first">
                          <?php  
                             if($row['aadhar'] == ""){
                              echo '<img src="assets/images/defaults/no-image.png" style="height: 200px; width: 200px;">';
                                 
                               }else{
                                   // echo '<img src="data:image/jpeg;base64,'.base64_encode($row['aadhar'] ).'" height="200" width="200" class="img-thumnail" />   '; 
                                  $imgPan = $row['aadhar'];
                                  echo "<img src=\"$imgPan\" height='200' width='100%' class='img-thumnail' />
                                  <div class='mask'><p>Aadhar</p></div>";
                                  }
                             ?>
                          </div>
                      </div>

                      <div class="col-md-55">
                          <div class="image view view-first">
                          <?php  
                             if($row['pan'] == ""){
                              echo '<img src="assets/images/defaults/no-image.png" style="height: 200px; width: 200px;">';
                                 
                               }else{
                                   // echo '<img src="data:image/jpeg;base64,'.base64_encode($row['pan'] ).'" height="200" width="200" class="img-thumnail" />   '; 

                                   $imgPan = $row['pan'];
                                  echo "<img src=\"$imgPan\" height='200' width='100%' class='img-thumnail'/>
                                  <div class='mask'><p>Pan</p></div>";
                                  }
                             ?>
                          </div>
                      </div>
                    </div>

<!-- /media gallery -->
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-offset-4 col-xs-offset-4">
                          
                     
                       <!-- <?php if($status==null) { ?>
                            <button class="btn btn-primary btn-md" class="" value="<?php echo $row['id'];?>" name="verify">Verify</button>
                            <button class="btn btn-danger btn-md" class="" value="<?php echo $row['id'];?>" name="reject">Reject</button>
                            <button class="btn btn-info btn-md" class="" value="<?php echo $row['id'];?>" name="update" type="submit">Update</button>
                          <?php }else if($status==1){ ?> 
                          <button class="btn btn-success btn-md" disabled="disabled">Verified</button>
                          <button class="btn btn-danger btn-md" class="" value="<?php echo $row['id'];?>" name="reject">Reject</button>
                          <button class="btn btn-info btn-md" value="" disabled="disabled">Update</button>
                           <?php } else if($status==0){ ?> 
                            
                            <button class="btn btn-primary btn-md" class="" value="<?php echo $row['id'];?>" name="verify">Verify</button>
                            <button class="btn btn-danger btn-md" class="" value="" disabled="disabled">Rejected</button>
                            <button class="btn btn-info btn-md" class="" value="<?php echo $row['id'];?>" name="update"  type="submit">Update</button>
                           <?php } ?> -->
                     
                      <a href="lend_camera_registration.php"  class="btn btn-warning">Back</a>
                       </div>
                      </div>
                    </form>
               
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