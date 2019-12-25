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

    <title>Rejected Request</title>

    <?php include('header/header.php'); ?>
  
    <script type="text/javascript">
  $('document').ready(function() {
  // select all checkbox  
  $('#select_all').on('click', function(e) {
    if($(this).is(':checked',true)) {
      $(".emp_checkbox").prop('checked', true);  
    }  
    else {  
      $(".emp_checkbox").prop('checked',false);  
    }   
    // set all checked checkbox count
    $("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
  });
  // set particular checked checkbox count
  $(".emp_checkbox").on('click', function(e) {
    $("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
  }); 
  // delete selected records
  $('#delete_records').on('click', function(e) { 
    var lendRequests = [];  
    $(".emp_checkbox:checked").each(function() {  
      lendRequests.push($(this).data('emp-id'));
    }); 
    if(lendRequests.length <=0)  {  
      alert("Please select records.");  
    }  
    else {  
      var message = "Are you sure you want to delete "+(lendRequests.length>1?"these":"this")+" record?";  
      var checked = confirm(message);  
      if(checked == true) {     
        var selected_values = lendRequests.join(","); 
        $.ajax({ 
          type: "POST",  
          url: "delete_lend_customer_query.php",  
          cache:false,  
          data: 'emp_id='+selected_values,  
          success: function(response) { 
            //remove deleted lendRequests rows
            var emp_ids = response.split(",");
            for (var i=0; i<emp_ids.length; i++ ) {           
              $("#"+emp_ids[i]).remove();
            }                   
          }   
        });       
      }  
    }  
  });
}); 

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
          <div class="">


            <div class="row">
              <!-- <div class="col-md-12 "> -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="margin-top: 57px;">
                  <div class="x_content">
                     <span class="section">Rejected Lend User</span>
                    <div class="row">

                        <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><input type="checkbox" id="select_all"></th>
                          <th style="width: 10px;">Sr.No</th>
                          <th>Name</th>
                          <th>Mobile No</th>
                          <th>E-mail</th>
                          <th>Start Date / Time</th>
                          <th>End Date / Time </th>
                          <!-- <th>Acceptance Status</th> -->
                          <th style="width: 78px;">Action</th>
                          <!-- <th style="width: 97px;">Status</th> -->
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
                  lend_details l,end_users e where l.user_id=e.id and ad_verify='0' order by l.id desc";  */
                  
                   $sql="SELECT l.*,e.name,l.model_name AS model_name, l.cat_id AS cat_id,
                  DATE_FORMAT(start_date,'%d-%m-%Y') AS 'start_date',
                  DATE_FORMAT(start_time,'%h:%i %p') AS 'start_time',
                  DATE_FORMAT(end_date,'%d-%m-%Y') AS 'end_date',  
                  DATE_FORMAT(end_time,'%h:%i %p') AS 'end_time' FROM
                  lend_details l,end_users e where l.user_id=e.id and lend_accept='0' order by l.id desc";

                      $result = mysqli_query($conn, $sql);
                      $return=mysqli_num_rows($result);
                      
                      if($return > 0)
                      {

                        $count = 0;

                       while($row = mysqli_fetch_assoc($result)) 
                       { 
                              $status = $row['ad_active'];
                              $modelName = $row['model_name'];
                              $catid = $row['cat_id'];
                              $count++;

                                $sql1 = "select count(p_id) as count from view_packages WHERE model_name='$modelName' and cat_id='$catid'";
                             
                                $result1 = mysqli_query($conn, $sql1);
                                $row1 = mysqli_fetch_assoc($result1);
                                $size = $row1['count'];
                          
                        ?>

                        <tr id="<?php echo $row["id"]; ?>">
                          <td><input type="checkbox" class="emp_checkbox" data-emp-id="<?php echo $row["id"]; ?>"></td>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $row['name'];?></td>
                          <td><?php echo $row['mobile1'];?></td>
                          <td><?php echo $row['email'];?></td>
                          <td><?php echo $row['start_date'];?> |
                              <?php echo $row['start_time'];?></td>
                          <td><?php echo $row['end_date'];?> |
                              <?php echo $row['end_time'];?></td>
                             <!--  <td></td> -->
                          <td>
                              <a href="view_rejected_lend_request.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-xs">View</a>


                              
                            <!--    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['id'];?>">Delete</button> -->
                          </td>

                        <!--  <td>
                            <form action="VerifiedLendStatus.php" onSubmit="if(!confirm('Are you sure ?')){return false;}" method="POST">

                            <?php if($size==3) { ?>

                            <?php if($status==null) {  ?>
                            <button class="btn btn-primary btn-xs" value="<?php echo $row['id'];?>" name="active">Active</button>
                            <button class="btn btn-info btn-xs" value="<?php echo $row['id'];?>" name="inactive">Inactive</button>

                            <?php }else if($status==1){ ?>

                            <button class="btn btn-success btn-xs"  disabled="disabled">Actived</button>
                            <button class="btn btn-info btn-xs" value="<?php echo $row['id'];?>" name="inactive">Inactive</button>

                             <?php } else if($status==0){ ?>

                            <button class="btn btn-success btn-xs" value="<?php echo $row['id'];?>" name="active">Active</button>
                            <button class="btn btn-info btn-xs" disabled="disabled">Inactived</button>

                             <?php } }

                             else{ ?>

                            <button class="btn btn-primary btn-xs" value="" name="active" disabled="disabled">Active</button>
                            <button class="btn btn-info btn-xs" value="" name="inactive" disabled="disabled">Inactive</button>

                          <?php   }


                             ?>
                          </form>
                          </td> -->



                  <!-- <div class="modal fade" id="myModal<?php echo $row['id'];?>" role="dialog">
                    <div class="modal-dialog">
                        
                          <!-- Modal content-->
                        <!--  <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete Record</h4>
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
                      </div> -->
                        </tr>

                        <?php }} ?>
                      </tbody>
                    </table>

                    <div class="row">
                        <center><div class="col-md-2 well ">
                          <span class="rows_selected" id="select_count">0 Selected</span>
                          <a type="submit" id="delete_records" class="btn btn-primary pull-right">Delete</a>
                        </div></center>
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