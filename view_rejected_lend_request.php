<?php
  session_start();
  $id =  $_SESSION['id'];
  
  if(!isset($id)){
    header('location:index.php');
   }

?>


 <?php 
include('config.php');
  $id=$_GET['id'];

  $sql=("SELECT *,DATE_FORMAT(start_date,'%d-%m-%Y') AS 'start_date',
  DATE_FORMAT(start_time,'%h:%i %p') AS 'start_time',
  DATE_FORMAT(end_date,'%d-%m-%Y') AS 'end_date', 
  DATE_FORMAT(start_time,'%h:%i %p') AS 'end_time' FROM lend_details WHERE id=$id"); 

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  

  ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>View Verified Camera</title>

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
                <!-- <form class="form-horizontal form-label-left" novalidate> -->
            <div class="row">           
                       <span class="section">Product Details</span>


      <!--  set in row -->
<div class="row">
<!-- <div class="col-md-1 col-sm-1 col-xs-12 form-group">
</div> -->

                <div class="item-form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Model Name <span class="required">*</span></label>
                    
                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                    <input type="text" value="<?php echo $row['model_name'];?>" class="form-control" readonly="readonly">
                  </div>
                </div>
 <!-- <div class="col-md-1 col-sm-1 col-xs-12 form-group">
</div> -->
                <div class="item-form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Model Number <span class="required">*</span></label>
                        
                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                    <input type="text" value="<?php echo $row['model_no'];?>" class="form-control" readonly="readonly">
                  </div>
                </div>
</div>
 <!-- end set in row -->

<div class="row">

<!-- <div class="col-md-1 col-sm-1 col-xs-12 form-group">
</div> -->
                <div class="item-form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Email <span class="required">*</span></label>
                    
                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                    <input type="text" value="<?php echo $row['email'];?>"  class="form-control" readonly="readonly">
                  </div>
                </div>

<!-- <div class="col-md-1 col-sm-1 col-xs-12 form-group">
</div> -->

                <div class="item-form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Mobile <span class="required">*</span></label>
                        
                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                    <input type="text" value="<?php echo $row['mobile1'];?>"  class="form-control" readonly="readonly">
                  </div>
                </div>
</div>


<div class="row">

<!-- <div class="col-md-1 col-sm-1 col-xs-12 form-group">
</div> -->
                 <div class="item-form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Locality <span class="required">*</span></label>
                    
                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                    <input type="text" value="<?php echo $row['location'];?>" class="form-control" readonly="readonly">
                    

                  </div>
                </div>
<!-- <div class="col-md-1 col-sm-1 col-xs-12 form-group">
</div> -->
                <div class="item-form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Address <span class="required">*</span></label>
                    
                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                   
                    <textarea class="form-control" readonly="readonly"><?php echo $row['address'];?></textarea>
                  </div>

                </div>
</div>

<div class="row">

<!-- <div class="col-md-1 col-sm-1 col-xs-12 form-group">
</div> -->
                 <div class="item-form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Start Date/Time <span class="required">*</span></label>
                    
                    <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                    <input type="text" value="<?php echo $row['start_date'];?>" class="form-control" readonly="readonly">
                   </div>

                    <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                    <input type="text" value="<?php echo $row['start_time'];?>" class="form-control" readonly="readonly">
                   </div>
                    

                </div>
<!-- <div class="col-md-1 col-sm-1 col-xs-12 form-group">
</div> -->
                <div class="item-form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">End Date/Time <span class="required">*</span></label>
                    
                    <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                    <input type="text" value="<?php echo $row['end_date'];?>" class="form-control" readonly="readonly">
                   </div>

                    <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                    <input type="text" value="<?php echo $row['end_time'];?>" class="form-control" readonly="readonly">
                   </div>

                </div>
</div>

<div class="clearfix"></div>
<div class="row">
<!-- <div class="col-md-1 col-sm-1 col-xs-12 form-group">
</div> -->

                <div class="item-form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Damage Description <span class="required">*</span></label>
                    
                    <div class="col-md-10 col-sm-10 col-xs-12 form-group">
                   
                    <textarea class="form-control" readonly="readonly"><?php echo $row['dam_desc'];?></textarea>
                  </div>
                </div>
             



</div>
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
                                  echo "<img src=\"$imgPan\" height='200' width='100%' class='img-thumnail' />
                                  <div class='mask'><p>Item Image</p></div>";
                                  }
                             ?>
                          </div>
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
                                  <div class='mask'><p>Insuarance</p></div>";
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
                                  echo "<img src=\"$imgPan\" height='200' width='100%' class='img-thumnail' />
                                  <div class='mask'><p>Pan</p></div>";
                                  }
                             ?>
                          </div>
                      </div>
                            
                    
                    </div>

<!-- /media gallery -->

       

      <div class="row">         
          <!-- <form action="" method="" class="control-label control-label">         -->
 
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-5 col-sm-offset-5 col-xs-offset-3">
                         
                         <!--   <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $id;?>">Delete</button> -->
                          <a href="rejected_lend_request.php" class="btn btn-warning">Back</a>
                        </div>
                      </div>

        <!-- Modal -->
                    <div class="modal fade" id="myModal<?php echo $id; ?>" role="dialog">
                      <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete File</h4>
                            </div>
                            <div class="modal-body">
                              <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              <a href="delete_lend_customer_query.php?id=<?php echo $id; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
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
        </div>
        <!-- /page content -->

        
      </div>
    </div>
    
   <?php include('footer/footer.php'); ?>  

  
   <script>
     
     //Initialize datetimepicker
        $('#myDatepicker1').datetimepicker({
            format: 'DD/MM/YYYY HH:MM:SS'
        });
    
        $('#myDatepicker2').datetimepicker({
            format: 'DD/MM/YYYY HH:MM:SS'
        });

    
   
   </script>

    

  </body>
</html>