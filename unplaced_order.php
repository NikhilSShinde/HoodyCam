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
    var rentRequests = [];  
    $(".emp_checkbox:checked").each(function() {  
      rentRequests.push($(this).data('emp-id'));
    }); 
    if(rentRequests.length <=0)  {  
      alert("Please select records.");  
    }  
    else {  
      var message = "Are you sure you want to delete "+(rentRequests.length>1?"these":"this")+" record?";  
      var checked = confirm(message);  
      if(checked == true) {     
        var selected_values = rentRequests.join(","); 
        $.ajax({ 
          type: "POST",  
          url: "delete_rent_rejected.php",  
          cache:false,  
          data: 'emp_id='+selected_values,  
          success: function(response) { 
            //remove deleted rentRequests rows
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
                      <span class="section">Unplaced Order Request
                        
                      </span>
                    <div class="row">
                      

                    <div class="table-responsive">
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
                          <th>Renter Info</th>
                        <!--  <th>Action</th> -->
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                      include('config.php');
                       
                  

                      $sql = "SELECT *,r.user_id,r.id, DATE_FORMAT(r.start_date,'%d-%m-%Y') AS 'start_date',
                      DATE_FORMAT(r.start_time,'%h:%i %p') AS 'start_time',
                      DATE_FORMAT(r.end_date,'%d-%m-%Y') AS 'end_date',
                      DATE_FORMAT(r.end_time,'%h:%i %p') AS 'end_time' FROM   rent_details r LEFT OUTER JOIN orders o ON (r.id = o.rent_details_id) WHERE o.rent_details_id IS NULL";

                      
                      $result = mysqli_query($conn, $sql);
                      $return=mysqli_num_rows($result);
                      
                      if($return > 0)
                      {
                          $count = 0;

                       while($row = mysqli_fetch_assoc($result)) 
                        { 

                            $uid = $row['user_id'];

                            $sql1 = "SELECT name from end_users where id=".$uid."";
                            $result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_assoc($result1);

                          
                            $count++;
                      ?>
                        <tr id="<?php echo $row["id"]; ?>">
                           <td><input type="checkbox" class="emp_checkbox" data-emp-id="<?php echo $row["id"]; ?>"></td>
                          <td><?php echo $count ?></td>
                          <td><?php echo $row1['name']; ?></td>
                          <td><?php  echo $row['mobile1']?></td>
                          <td><?php  echo $row['email']?></td>
                          <td><?php  echo $row['start_date']?> | <?php  echo $row['start_time']?></td>
                          <td><?php  echo $row['end_date']?> | <?php  echo $row['end_time']?></td>
                          <td>
                           <a href="view_unplaced_order.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-xs" value="">View</a>
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

                  <div class="row">
                        <div class="col-md-2 well">
                          <span class="rows_selected" id="select_count">0 Selected</span>
                          <a type="submit" id="delete_records" class="btn btn-primary pull-right">Delete</a>
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

  </body>
</html>