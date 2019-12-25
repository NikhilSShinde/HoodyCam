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

    <title>User Ratings</title>

    <?php include('header/header.php'); ?>

    <style>
      .rating{
        color: orange;
      }
    </style>
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
                      <span class="section">Feedback On Cameraman</span>
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
                  
                  </form>

                         <!-- <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
                            <a href="photouser_feedback.php"  class="btn btn-warning">Back</a>
                          </div>
                       </div>
                      </div -->

                  </div>
                </div>
              </div>
            </div>





            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content" >
                      <span class="section">User Feedback</span>
                
                    <div class="row">

                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 5%">Sr.No</th>
                          <th>User Name</th>
                          <th>Mobile No</th>
                          <th style="width: 30%">Feedback</th>
                          <th>Ratings</th>
                        </tr>
                      </thead>
                        
                        <tbody>
                        <?php          
                                include('config.php');

                                $sql = "SELECT * from feedback_cameramen f INNER JOIN allocates a on f.allocate_id=a.id WHERE a.signup_id='".$id."'";
                                $result = mysqli_query($conn, $sql);
                                $return=mysqli_num_rows($result);
                                
                                if($return > 0)
                                {
                                      $count = 0;

                                 while($row = mysqli_fetch_assoc($result))  
                                  { 

                                      $count++;

                                      $uid = $row['photo_user_id']; 

                                      $query = "SELECT e.name,u.mobile1 from photo_user_details u, end_users e where e.id=u.user_id AND u.id=$uid";
                                       $result2 = mysqli_query($conn, $query);
                                       $row2 = mysqli_fetch_assoc($result2);

                                  ?> 

                              <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo $row2['name'];?></td>
                                <td><?php echo $row2['mobile1'];?></td>
                                <td><textarea style="width: 100%; border: none; padding: 0px;" readonly="readonly"><?php echo $row['feedback']; ?>
                                </textarea></td>

                                <td>
                                  <?php if($row['rating']==null) {  ?>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span> 

                                  <?php }else if($row['rating']=='1'){ ?>
                                  <span class="fa fa-star checked rating"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span> 

                                  <?php } else if($row['rating']=='2'){ ?>
                                  <span class="fa fa-star checked rating"></span>
                                  <span class="fa fa-star checked rating"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span> 

                                  <?php } else if($row['rating']=='3'){ ?>
                                  <span class="fa fa-star checked rating"></span>
                                  <span class="fa fa-star checked rating"></span>
                                  <span class="fa fa-star checked rating"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span> 
                                  
                                  <?php } else if($row['rating']=='4'){ ?>
                                  <span class="fa fa-star checked rating"></span>
                                  <span class="fa fa-star checked rating"></span>
                                  <span class="fa fa-star checked rating"></span>
                                  <span class="fa fa-star checked rating"></span>
                                  <span class="fa fa-star"></span> 

                                  <?php } else{ ?>
                                  <span class="fa fa-star checked rating"></span>
                                  <span class="fa fa-star checked rating"></span>
                                  <span class="fa fa-star checked rating"></span>
                                  <span class="fa fa-star checked rating"></span>
                                  <span class="fa fa-star checked rating"></span> 
                                  <?php } ?>
                                </td>
                              </tr>
                       
                          <?php   } } ?>
                        
                       
                      </tbody>
                    </table>



                    </div>
                      
                      <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
                            <a href="photouser_feedback.php"  class="btn btn-warning">Back</a>
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