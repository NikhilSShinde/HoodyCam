<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Feedback</title>

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
                     <span class="section">Cameraman List</span>
                    <div class="row">

                        <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr.No</th>
                          <th>Name</th>
                          <th>Mobile No</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>

                        <?php  

                                include('config.php');

                                $sql = "SELECT * from cameraman_signups order by id desc";
                                $result = mysqli_query($conn, $sql);
                                $return=mysqli_num_rows($result);
                                
                                if($return > 0)
                                {
                                      $count = 0;

                                 while($row = mysqli_fetch_assoc($result))  
                                  { 

                                      $count++;

                                  ?>

                                      <tr>
                                        <td><?php echo $count; ?></td>
                                        <!-- <td><?php echo $row['sub_cat_name'];?></td> -->
                                        <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['mobile1'];?></td>
                                        <td><a href="view_photouser_feedback.php?id=<?php echo $row['id'];?>"  class="btn btn-warning btn-xs">View</a></td>
                                        
                                      </tr>
                       
                         <?php   }}?>
                        
                       
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