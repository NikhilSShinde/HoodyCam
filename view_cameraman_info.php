<?php
  session_start();
  $id =  $_SESSION['id'];
  
  if(!isset($id)){
    header('location:index.php');
   }
include('config.php');
$id = $_GET['id'];


  $sql = "SELECT * FROM cameraman_signups WHERE id='".$id."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $sql1 = "SELECT * FROM cameraman_signups s,cameraman_bank_details bd WHERE s.id=bd.signup_id AND s.id='".$id."'";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_assoc($result1);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>cameraman info</title>

    <?php include('header/header.php'); ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">


            <?php include('sidebar/sidebar.php'); ?>

        <!-- top navigation -->
         <?php include('topbar/top_navbar.php'); ?>
        <!-- /top navigation -->
     
      <!-- page content -->
        <div class="right_col" role="main">
         
             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="margin-top: 57px;">
                  
                  <div class="x_content" >
                      <span class="section">Cameraman Personal details</span>
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar" class="col-md-12 col-sm-12 col-xs-10 text_center">
 
                            <?php  
                             if($row['profile_pic'] == ""){
                              echo "<img src='assets/images/defaults/no-image.png' class='img-responsive avatar-view' style='height: 200px; width: 200px'>";
                                 
                               }else{
                                   
                                   $imgPan = $row['profile_pic'];
                              echo "<img src=\"$imgPan\" class='img-responsive avatar-view' style='height: 200px; width:200px'>";
                                 
                                 
                                  }
                             ?> 



                        </div>
                      </div>
                   

                      <!-- start skills -->
                      <div class="clearfix"> </div>
                     <h4><strong>Specialized For :</strong></h4>
                      <ul class="list-unstyled user_data">
                        
                       <?php  


                        $query = "SELECT sub_cat1 FROM signup_sub_cats c WHERE c.user_id = $id";
 
                                $result = mysqli_query($conn,$query);
                                 
                                while($values = mysqli_fetch_array($result))
                                {
                                   $values= unserialize($values['sub_cat1']);
                                  
                                   if($values != ""){
                                   foreach($values as $value)
                                   {
                                      print_r("<span style=''>".$value."</span><br/>");
                                   }
                                }
                                    
                               else{}
                                }
                                
                             ?>
                      </ul> 
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Photographer Details</h2>
                        </div>
                      </div>
                      <br/>
                      

                       <form action=""  method="POST" class="form-horizontal form-label-left">
            
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Name</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row['name'] ?>" name="name" readonly="readonly">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Address</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                       <textarea class="form-control" name="address" readonly="readonly"><?php echo $row['address'] ?></textarea>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Email-Id</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row['email'] ?>" name="email" readonly="readonly">
                        </div>
                         <label class="control-label col-md-2 col-sm-2 col-xs-12">D.O.B.</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row['dob'] ?>" name="dob" readonly="readonly">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Mobile No.1</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row['mobile1'] ?>" name="mobile1" readonly="readonly">
                        </div>
                         <label class="control-label col-md-2 col-sm-2 col-xs-12">Mobile No.2</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row['mobile2'] ?>" name="mobile2" readonly="readonly">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Adhar</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          
                           <div class="image view view-first">
                          <?php  
                             if($row['adhar'] == ""){
                              echo '<img src="assets/images/defaults/no-image.png" style="height: 200px; width: 100%;">';
                                 
                               }else{
                                   
                                 $imgPan = $row['adhar'];
                                  echo "<img src=\"$imgPan\" style='height:200px; width:320px' class='img-thumnail img-responsive' />";
                                  }
                             ?>
                          </div>
                        </div>
                         <label class="control-label col-md-2 col-sm-2 col-xs-12">Pan</label>
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
                      </div><br/>

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Photographer Bank Details</h2>
                        </div>
                      </div>
                      <br/>

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Bank Name</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row1['bank_name'] ?>" name="mobile1" readonly="readonly">
                        </div>
                         <label class="control-label col-md-2 col-sm-2 col-xs-12">Account No</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row1['acc_no'] ?>" name="mobile2" readonly="readonly">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">A/c Holder Name</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row1['ac_holder_name'] ?>" name="adhar" readonly="readonly">
                        </div>
                         <label class="control-label col-md-2 col-sm-2 col-xs-12">IFSC Number</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row1['ifsc'] ?>" name="pan" readonly="readonly">
                        </div>
                      </div>

                      </form>
                      


                      <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
                            <a href="cameraman_signup_list.php"  class="btn btn-warning">Back</a>
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