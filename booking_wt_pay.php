<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User Request</title>

    <?php include('header/header.php'); ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
           
           <?php include('sidebar/sidebar.php') ?>
  
          </div>
        </div>

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
                      <span class="section">Request for Cameraman </span>  
                  
                  <div class="row">
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr.No</th>
                          <!--<th>Category</th>
                          <th>Sub-Category</th>-->
                          <th>User Name</th>
                          <th>Mobile No</th>
                          <th>Booking Date</th>
                          <!--<th>Status</th>
                          <th>Payment Mode</th>-->
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>


                        <?php
                              include('config.php');

                              // $sql = "SELECT u.*, e.name as name, 
                              // DATE_FORMAT(start_date,'%d-%m-%Y') AS 'start_date',
                              // DATE_FORMAT(start_time,'%h:%i %p') AS 'start_time',
                              // DATE_FORMAT(end_time,'%h:%i %p') AS 'end_time'
                              // FROM photo_user_details u LEFT JOIN allocates a ON u.id = a.photo_user_id , end_users e WHERE u.user_id=e.id AND (u.id != a.photo_user_id OR photo_user_id is null)";

                              $sql ="SELECT *, e.name,u.id,

                      DATE_FORMAT(u.start_date,'%d-%m-%Y') AS 'start_date',
                      DATE_FORMAT(u.start_time,'%h:%i %p') AS 'start_time',
                     
                      DATE_FORMAT(u.end_time,'%h:%i %p') AS 'end_time' FROM
                      photo_user_details u , orders o, transactions t, end_users e WHERE

                      u.id=o.photo_details_id AND o.id=t.order_id AND e.id=u.user_id AND u.status = '1' AND t.order_status='Success' order by t.id desc";
                              

                              $result = mysqli_query($conn,$sql);
                              $return=mysqli_num_rows($result);

                              if($return > 0){

                                $count = 0;

                                while($row = mysqli_fetch_assoc($result)){

                                $count++;  
                                
                        ?>
                        
                        <tr>
                          <td><?php echo $count ?></td>
                         
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['mobile1']; ?></td>
                          <td><?php echo $row['start_date'];?> |
                              <?php echo $row['start_time'];?> TO <?php echo $row['end_time'];?></td>
                         
                          <td>
                              <a href="view_booking_wt_pay.php?id=<?php echo $row['id'];?>"  class="btn btn-warning btn-xs">View</a>
                       

                               <a href="#myModal" id1="<?php echo $row['id'];?>"  id2="<?php echo $row['start_date'];?>" data-toggle="modal" class="push btn btn-primary btn-xs">Allocate</a> 
                          </td>
                        </tr>


                        <?php   }
                                  }  ?>
                        
                      

                      </tbody>

                    </table>


<!-- start demo model -->
  <div  class="modal fade" id="myModal" >
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title">Allocate Camera Man</h3>
        </div>
        <div class="modal-body">

        <form action="allocate.php" method="POST" onSubmit="if(!confirm('Are you sure ?')){return false;}"> 
          <div id="modalContent"></div>
         </form> 
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      
        </div>
        
      </div>
    </div>
  </div>   

<!-- end demo model -->


                        

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
     
     $(function(){

   $('.push').click(function(){
      var request_id = $(this).attr('id1');
      var date = $(this).attr('id2');
     

       $.ajax({
        cache: false,
        type: 'POST',
        url: "free_cameraman_list.php?req_id="+request_id+"&date="+date,

       
        success: function(data) 
        {
            $('#myModal').show();
            $('#modalContent').show().html(data);
        }
    });

});
});   

   </script>

  </body>
</html>