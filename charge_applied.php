<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Charges Applied</title>

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
                    <div class="row">
                     

 <span class="section">Product Used (Charges Applied Rent User List)</span>  

                     <table id="datatable-fixed-header1" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px;">Sr.No</th>
                          <th>Lend User Name</th>
                          <th>Rent User Name</th>
                          <th>Start Date|Time</th>
                          <th>End Date|Time</th>
                          <th>Trip Start Date|Time</th>
                          <th>Trip End Date|Time</th>
                          <!-- <th>Damage Description</th> -->
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                <?php 
                      include('config.php');
                       
                      $sql="SELECT t.*,e.name, 

                        DATE_FORMAT(l.start_date,'%d-%m-%Y') AS 'start_date',
                        DATE_FORMAT(l.start_time,'%h:%i %p') AS 'start_time',
                        DATE_FORMAT(l.end_date,'%d-%m-%Y')   AS 'end_date',
                        DATE_FORMAT(l.end_time,'%h:%i %p')   AS 'end_time',
                        DATE_FORMAT(t.start_trip,'%d-%m-%Y | ') AS 'start_trip_date',
                        DATE_FORMAT(t.start_trip,'%h:%i %p') AS 'start_trip_time',
                        DATE_FORMAT(t.end_trip,'%d-%m-%Y | ')AS 'end_trip_date',
                        DATE_FORMAT(t.end_trip,'%h:%i %p') AS 'end_trip_time'

                        FROM rent_details r, lend_details l, end_users e, trips t WHERE
                        l.id=t.lend_details_id AND r.id=t.rent_details_id AND t.end_trip is not null AND t.total_amount is not null AND  e.id=l.user_id order by t.id desc";

                      
                      $result = mysqli_query($conn, $sql);
                      $return=mysqli_num_rows($result);
                      
                      if($return > 0)
                      {
                          $count = 0;

                       while($row = mysqli_fetch_assoc($result)) 
                        {
                            
                             $count++;
                             $rid = $row['rent_details_id'];
                             
                             
                             $sql1="SELECT r.*,e.name as 'rname' FROM
				  end_users e,rent_details r, trips t WHERE 
				  e.id=r.user_id AND r.id=t.rent_details_id AND r.id='".$rid."'";
				  $result1 = mysqli_query($conn, $sql1);
				  $row1 = mysqli_fetch_assoc($result1);
              ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row1['rname'];?></td>
                  <td><?php echo $row['start_date'];?> | <?php echo $row['start_time'];?></td>
                  <td><?php echo $row['end_date'];?> | <?php echo $row['end_time']?></td>
                  <td><?php echo $row['start_trip_date'];?><?php echo $row['start_trip_time'];?></td>
                  <td><?php echo $row['end_trip_date'];?><?php echo $row['end_trip_time'];?></td>
                 <!--  <td><textarea readonly="readonly"> <?php echo $row['damage_desc'];?>
                      </textarea> -->
                  </td>
                  <td>
                      <a href="view_charge_applied.php?id=<?php echo $row['id'];?>">
                        <button class="btn btn-warning btn-xs" value="">View</button>
                      </a>
                  </td>
                      </tr>
                        <?php   }}  ?>

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

  <script> $(document).ready(function() {
    $('#datatable-fixed-header1').DataTable();
    
} );
</script>


  </body>
</html>