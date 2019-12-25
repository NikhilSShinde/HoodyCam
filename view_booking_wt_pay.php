<?php
  session_start();
  $id =  $_SESSION['id'];
  
  if(!isset($id)){
    header('location:index.php');
   }

?>

<?php include('config.php');

  $id=$_GET['id'];
  
  
  $sql= "SELECT *, e.name, e.email,c.name as category_name,
  DATE_FORMAT(start_date,'%d-%m-%Y') as 'start_date',
  DATE_FORMAT(start_time,'%h:%i %p') as 'start_time',
  DATE_FORMAT(end_time,'%h:%i %p') as 'end_time'  FROM
  end_users e, photo_user_details u, photo_sub_cat sc, photoshoot_package p, photo_categories c WHERE  u.cat_id=c.id AND u.sub_cat_id=sc.id AND u.package_id = p.id AND  u.user_id=e.id AND u.id=$id";


  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);


  $sql1 = "SELECT t.amount FROM photo_user_details u, transactions t,orders o WHERE t.order_id=o.id AND u.id=o.photo_details_id AND u.id=$id";
 
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

    <title>View Request</title>

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
                   
                     <span class="section">Request for Cameraman</span>
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
                         <input type="text" value="<?php echo $row['email']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
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
                        
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">End Time</label>
                        <!-- <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" value="<?php echo $row['end_date']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div> -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['end_time']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                      </div>


                    <div class="item form-group">
                       
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">No of pics</label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['no_of_pics']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Description</label>
                        
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <!-- <input type="text" value="<?php echo $row['description']?>" class="form-control col-md-7 col-xs-12" readonly="readonly"> -->
                        
                          <textarea class="form-control col-md-7 col-xs-12" readonly="readonly"><?php echo $row['description']?></textarea>

                        </div>
                       

                    </div>  

                     <span class="section">Choosed Package Details</span>

                     <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Category Name</label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['category_name']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        

                       <label class="control-label col-md-2 col-sm-2 col-xs-12">Sub Category
                        </label>
                         <div class="col-md-4 col-sm-4 col-xs-12">

                          <input type="text" value="<?php echo $row['cat_name']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        
                    </div>

                    <div class="item form-group">
                      
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Package No</label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['pack_no']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Pic Range(min-max)</label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['min_pic']?>-<?php echo $row['max_pic']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>  

                    </div>

                     <div class="item form-group">
                      
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Price Per Pic</label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['price_per_pic']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">No of Hours</label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['no_of_hrs']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>  

                    </div>

                     <div class="item form-group">
                      
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">1st Five Pic Price</label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['five_pic_price']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Travel Allowance</label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['travel_allowance']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>  

                    </div>

                     <span class="section">Total Transaction Details</span>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Amount Paid Online</label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row1['amount']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                    </div>

                     

                       
                        


                  <!--  <div class="item form-group">
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
                      </div> -->
                        



                    </div>
                  </form>
                      
                      <div class="ln_solid"></div>
                      
                      <form  action="RentStatus.php" onSubmit="if(!confirm('Are you sure ?')){return false;}" method="POST"> 
                      <div class="form-group">
                        
                        <div class="col-md-6 col-sm-offset-5">
                          
                        <!--    <?php if($status==null) { ?>
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
                           
                          <?php } ?> -->
                            
                     
                      <a href="booking_wt_pay.php" class="btn btn-warning">Back</a>
                        
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