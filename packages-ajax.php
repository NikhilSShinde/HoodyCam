<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Package</title>

    <?php include('header/header.php'); ?>

<!-- Script for dropdown select  -->
<script type="text/javascript">
$(document).ready(function()
{   
  // function to get all records from table
  // function getAll(){
    
  //   $.ajax
  //   ({
  //     url: 'getproducts.php',
  //     data: 'action=showAll',
  //     cache: false,
  //     success: function(r)
  //     {
  //       $("#display").html(r);
  //     }
  //   });     
  // }
  
  // getAll();
  // function to get all records from table
  
  
  // code to get all records from table via select box
  $("#getProducts").change(function()
  {       
    var id = $(this).find(":selected").val();
     alert(id);

    var dataString = 'action='+ id;
        
    $.ajax
    ({
      url: 'getproducts.php',
      data: dataString,
      cache: false,
      success: function(r)
      {
        $("#display").html(r);
      } 
    });
  })
  // code to get all records from table via select box
});
</script>
  </head>

  <body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><span>Softians Technologies</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="assets/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <?php include('sidebar/sidebar.php') ?>

            
          </div>
        </div>

        <!-- top navigation -->
         <?php include('topbar/top_navbar.php'); ?>
        <!-- /top navigation -->
         

        


      <!-- page content -->
        
 <!-- page content -->
        <div class="right_col" role="main">
          <!-- <div class=""> -->


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel" style="margin-top: 57px;">
                    <div class="x_content">
                      <form class="form-horizontal form-label-left" method="post" action="add_package_query.php">
                       <span class="section">Add Package</span>
                       <div class="col-md-1"></div>
                            
                        <div class="col-md-10 col-sm-12 col-xs-12 form-group">
                        
                        <div class="row"> 
                         <div class="item-form-group">
                              
                              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Category Name<span class="required">*</span></label>
                                          
                                <div class="col-md-4 col-sm-2 col-xs-12 form-group">
                                  
                                  <select class="form-control" name="category_id" required="required">
                                     <option value="">SELECT</option>                                
                                  <?php
                                        include('config.php');
                                        $sql1=("SELECT  * FROM `rent_lend_category`");                           
                                        
                                        $result1 = mysqli_query($conn, $sql1);
                                        $return1=mysqli_num_rows($result1);
                                        
                                        if($return1 > 0)
                                        {
                                          while($row1 = mysqli_fetch_array($result1))
                                  {?>
                                              <option value="<?php echo ($row1['rent_lend_cat_id']); ?>"><?php echo ($row1['rent_lend_cat_name']); ?></option>                                                  
                                              <?php }
                                              
                                            }
                                  ?>
                                  </select>
                                </div>
                          </div>
                     
                          <div class="item-form-group">
                                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Package No<span class="required">*</span>
                                  </label>
                                  <div class="col-md-4 col-sm-2 col-xs-12 form-group">
                                      <select class="form-control" name="package_no">
                                        <option value="">SELECT</option>
                                        
                                           <?php
                                        include('config.php');
                                        $sql1=("SELECT rent_package_no FROM `rent_package_no`");                           
                                        
                                        $result1 = mysqli_query($conn, $sql1);
                                        $return1=mysqli_num_rows($result1);
                                        
                                        if($return1 > 0)
                                        {
                                          while($row1 = mysqli_fetch_array($result1))
                                  {?>
                                              <option value="<?php echo ($row1['rent_package_no']); ?>"><?php echo ($row1['rent_package_no']); ?></option>                                                  
                                              <?php }
                                              
                                            }
                                  ?>

                                      </select>
                                  </div>
                          </div>
                     

                      <div class="clearfix"></div> 
                         <div class="item-form-group">
                              
                              <label class="control-label col-md-2 col-sm-2 col-xs-12 " for="first-name">No of Days(Range)<span class="required">*</span></label>
                                          
                                      <div class="col-md-2 col-sm-1 col-xs-12 form-group"> 
                                        <input type="text" name="start" placeholder="e.g. 1" class="form-control">
                                      </div>
                                     
                                      <div class="col-md-2 col-sm-1 col-xs-12 form-group"> 
                                        <input type="text" name="end" placeholder="e.g. 10" class="form-control">
                                      </div>
                          </div>
                                
                          <div class="item-form-group">
                                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Rate per day<span class="required">*</span>
                                  </label>
                                  <div class="col-md-4 col-sm-2 col-xs-12 form-group">
                                      <input type="text" name="rate" placeholder="Rate" class="form-control">
                                  </div>
                          </div>
                      </div>
                      

                       <div class="row">
                        <div class="ln_solid"></div>
                          <div class="col-md-6 col-md-offset-5">
                            <button id="send" type="submit" name="submit" class="btn btn-success">Add</button>
                            <!-- <button type="submit" class="btn btn-warning">Update</button> -->
                            <button type="submit" class="btn btn-primary">Cancel</button>
                          </div>
                       </div><br>
                       
                  </div><!--/.col-md-10 -->
                  <div class="col-md-1"></div> 
                   </form> <!--/form -->  
                        
               
                <span class="section">View Package</span>
<div class="container">
                <div class="row">
                  
                    <div class="item-form-group">
                              
                              <label class="control-label col-md-2 col-sm-2 col-xs-6" for="Category name">Select Category<span class="required">*</span></label>
                                          
                                <div class="col-md-2 col-sm-2 col-xs-6 form-group">
                                  
                                  <select class="form-control" name="category_name" id="getProducts">
                                     <option value="showAll" selected="selected">SELECT</option>                                
                                  <?php
                                        include('config.php');
                                        $sql1=("SELECT  * FROM `rent_lend_category`");                           
                                        
                                        $result1 = mysqli_query($conn, $sql1);
                                        $return1=mysqli_num_rows($result1);
                                        
                                        if($return1 > 0)
                                        {
                                          while($row1 = mysqli_fetch_array($result1))
                                  {?>
                                              <option value="<?php echo ($row1['rent_lend_cat_id']); ?>"><?php echo ($row1['rent_lend_cat_name']); ?></option>                                                  
                                              <?php }
                                              
                                            }
                                  ?>
                                  </select>
                                </div>
                          </div>

                </div>

              
                  
   <div class="" id="display">
       <!-- Records will be displayed here -->
    </div>  

                    

</div>  <!--/div class="container" -->        
                
                </div>
              </div>
            </div>
          </div>


        
        <!-- /page content -->

        
      </div>
    </div>
     

   <?php include('footer/footer.php'); ?>

<script type="text/javascript">
  $('#datatable-fixed-header1').DataTable( {
    "bInfo" : false,
    "paging": false,
    "searching": false
} );

</script>


  </body>
</html>

