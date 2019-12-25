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
                    <div class="row">

                        <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sub-Category</th>  
                          <th>Name</th>
                          <th>Mobile No</th>
                          <th>status</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <tr>
                          <td>Family Parties</td>
                          <td>Dipak Raypure</td>
                          <td>9080908090</td>
                          <td>Free</td>
                          <td><button class="btn btn-warning btn-xs" value="">View</button></td>
                          
                         
                         
                        </tr>
                        <tr>
                          <td>Baby Photoshoot</td>
                          <td>Nikhil Shinde</td>
                          <td>8008008000</td>
                          <td>Busy</td>
                           <td><button class="btn btn-warning btn-xs" value="">View</button></td>
                         
                         
                        </tr>
                       
                        
                       
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