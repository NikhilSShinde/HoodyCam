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
                     <span class="section">Verified Lend Users</span>
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
                         
                          <th style="width:50px;">Action</th>
                          <th style="width: 97px;">Accept Status</th>
                          <th style="width: 97px;">Status</th>
                        </tr>
                      </thead>
              <tbody>

                <?php
                  include('config.php');
                     
                /*  $sql="SELECT l.*,e.name,l.model_name AS model_name, l.cat_id AS cat_id,
                  DATE_FORMAT(start_date,'%d-%m-%Y') AS 'start_date',
                  DATE_FORMAT(start_time,'%h:%i %p') AS 'start_time',
                  DATE_FORMAT(end_date,'%d-%m-%Y') AS 'end_date',  
                  DATE_FORMAT(end_time,'%h:%i %p') AS 'end_time' FROM
                  lend_details l,end_users e where l.user_id=e.id and ad_verify='1' and (lend_accept='0' or lend_accept='1') order by l.id desc";   */
                  
                  
                    $sql="SELECT l.*,e.name,l.model_name AS model_name, l.cat_id AS cat_id,
                  DATE_FORMAT(start_date,'%d-%m-%Y') AS 'start_date',
                  DATE_FORMAT(start_time,'%h:%i %p') AS 'start_time',
                  DATE_FORMAT(end_date,'%d-%m-%Y') AS 'end_date',  
                  DATE_FORMAT(end_time,'%h:%i %p') AS 'end_time' FROM
                  lend_details l,end_users e where l.user_id=e.id and lend_accept='1' and check_stock='0' order by l.id desc";   




                      $result = mysqli_query($conn, $sql);
                      $return=mysqli_num_rows($result);
                      
                      if($return > 0)
                      {

                        $count = 0;

                       while($row = mysqli_fetch_assoc($result)) 
                       { 
                              $status = $row['ad_active'];
                              $accept_status = $row['lend_accept'];
                              $modelName = $row['model_name'];
                              $catid = $row['cat_id'];
                              $count++;

                                $sql1 = "select count(p_id) as count from view_packages WHERE model_name='$modelName' and cat_id='$catid'";
                             
                                $result1 = mysqli_query($conn, $sql1);
                                $row1 = mysqli_fetch_assoc($result1);
                                $size = $row1['count'];
                          
                        ?>

                        <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $row['name'];?></td>
                          <td><?php echo $row['mobile1'];?></td>
                          <td><?php echo $row['email'];?></td>
                          <td><?php echo $row['start_date'];?> |
                              <?php echo $row['start_time'];?></td>
                          <td><?php echo $row['end_date'];?> |
                              <?php echo $row['end_time'];?></td>
                           
                          <td>
                              <!--<a href="view_user_accept.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-xs">View</a> -->
                              <a href="view_booked_item.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-xs">View</a>
                              
                              <!-- <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['id'];?>" >Delete</button> -->
                          </td>
                          <td>
                                <?php if($accept_status=='1') { ?> 
                                     
                                     <center> <i class="fa fa-check-circle-o " style="font-size:25px;color:#20bfa7"></i></center>
                                <?php }else{ ?>
                                     

                                       <center> <i class="fa fa-times-circle-o" style="font-size:25px;color:#db0505"></i></center>
                                   <?php  }  ?>
                          </td>

                        

                          <td>
                            <form action="VerifiedLendStatus.php" onSubmit="if(!confirm('Are you sure ?')){return false;}" method="POST">

                            <?php if($size==3 && $accept_status==1) { ?>

                            <?php /* if($status==null) {  ?>
                            <button class="btn btn-primary btn-xs" value="<?php echo $row['id'];?>" name="active">Active</button>
                            <!--<button class="btn btn-info btn-xs" value="<?php echo $row['id'];?>" name="inactive">Inactive</button>-->

                            <?php /*}else */if($status==1){ ?>

                            <!--<button class="btn btn-success btn-xs"  disabled="disabled">Actived</button>-->
                           <button class="btn btn-info btn-xs" value="<?php echo $row['id'];?>" name="inactive">Remove</button>

                             <?php } else /*if($status==0)*/{ ?>

                           <!--  <button class="btn btn-success btn-xs" value="<?php echo $row['id'];?>" name="active">Active</button> -->
                            <button class="btn btn-info btn-xs" disabled="disabled">Deactived</button>

                             <?php } } 

                            /* else if($size<3 && $accept_status==1){ ?>

                            <button class="btn btn-primary btn-xs" value="" name="" disabled="disabled">Active</button>
                           <a href="add_packages.php" title="Click to Add Package" class="btn btn-xs btn-danger"><i class="fa fa-plus-circle"></i></a>
                           <!-- <button class="btn btn-info btn-xs" value="" name="inactive" disabled="disabled">Inactive</button> -->

                          <?php   } else{ ?>

                                 <button class="btn btn-danger btn-xs" value="<?php echo $row['id'];?>" name="reject">Reject</button>

                        <?php  }


                            */ ?>
                          </form>
                          </td>



                  <div class="modal fade" id="myModal<?php echo $row['id'];?>" role="dialog">
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
                              <a href="delete_lend_customer_query.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
                            </div>
                          </div>
                        </div>
                      </div>
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