  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>View Package</title>

    <?php include('header/header.php'); ?>

    <script type="text/javascript">
      function update(p_id)
      {
        $(document).ready(function(){
         alert(p_id);
          $("#myModal").modal("show");
          var tmp = parseInt($.trim(p_id));
          $("#myModal #pid").val(tmp);

        });
      }

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

          <!-- Modal 1 -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <!-- Modal header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Package Information</h4>
        </div>
        <!-- /Modal header -->
        
        <!-- Modal Body -->
        <div class="modal-body">
          <form id="demo-form2"  class="form-horizontal form-label-left" action="update_package_query.php" method="POST">

                      <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="category-name">Category Name <span class="required"></span></label>
                      
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                          <input type="text" name="" value="<?php echo ($row2['name']); ?>" required="required" class="form-control col-md-7 col-xs-12 form-group" readonly="readonly">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="package no">Package No <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" name="" value="<?php echo $row2['package_no'];?>" required="required" class="form-control col-md-7 col-xs-12 form-group" readonly="readonly">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12 form-group">No of Days(Range)</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                          <input  type="text" name="start" value="<?php echo $row2['start_day'];?>" required="required" class="form-control col-md-4 col-xs-12 form-group">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                         <input type="text" name="end" value="<?php echo $row2['end_day'];?>" 
                         required="required" class="form-control col-md-4 col-xs-12 form-group">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="last-name">Rate per Day <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                          <input type="text"  name="rate" value="<?php echo $row2['rate_per_day'];?>" required="required" class="form-control col-md-7 col-xs-12 form-group">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="last-name">Deposite <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                          <input type="text"  name="deposite" value="<?php echo $row2['deposite'];?>" required="required" class="form-control col-md-7 col-xs-12 form-group">
                        </div>
                      </div>
                     
                        <!-- <div class="ln_solid"></div> -->
                        <div class="form-group">
                        <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-5">
                          <button type="submit" name="submit"  class="btn btn-success">Submit</button>
                          <input type="hidden" id="pid" name="p_id">
                          <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                         
                        </div>
                      </div>
                      -

            </form>
        </div> <!--    Modal Body -->


        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>  <!-- Modal content -->
      
    </div>
  </div>

  <!-- /modal 1 end -->
       


            <div class="row">
             
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="margin-top: 57px;">
                  <div class="x_content">
                    <div class="row">

                      
                 <span class="section">View Package</span>

                <div class="row">
                  <form action="" class="form-horizontal form-label-left" method="POST">
                    <div class="item-form-group">
                            <label class="control-label  col-md-2 col-sm-2 col-xs-12" for="Category name">Select Category<span class="required">*</span></label>
                                          
                                <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                                  
                                  <select class="form-control" name="category_name" id="type2">
                                     <option value="">SELECT</option>
                                    
                                  <?php

                                   include('config.php');
                                        $sql1=("SELECT  * FROM `rent_lend_categories`");                           
                                        
                                        $result1 = mysqli_query($conn, $sql1);
                                        $return1=mysqli_num_rows($result1);
                                        
                                        if($return1 > 0)
                                        {
                                          while($row1 = mysqli_fetch_array($result1))
                                          {    
                                             

                                          ?>
                                              <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?> </option>

                                    <?php }
                                              
                                         }
                                  ?>
                                  </select>
                                </div>
                          </div>

                         

                          <div class="item-form-group">
                                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Model Name<span class="required">*</span>
                                  </label>
                                  <div class="col-md-2 col-sm-2 col-xs-12 form-group">      
                                       <select  id="type3" name="model_name" class="form-control">
                                         
                                       </select>
                                  </div>     
                              
                            <div class="col-md-2 form-group">       
                              <button class="btn btn-primary btn-md "  name="search">Search</button>
                            </div>
                          </div>
                 </form>
              </div>  
              <br/>


                   <table id="datatable-fixed-header1" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Category Name</th>
                          <th>Model Name</th>
                          <th>Package No</th>
                          <th>No of days (Range)</th>
                          <th>Rate per Day</th>
                          <th>Deposite</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                <tbody>

         

                  <?php       global $category;
                              global $ModelName;
                              
                                $category="";
                                $ModelName="";
                           
                            include("config.php");
                    if(!isset($_POST["search"]))
                      {
         
 
                      include('config.php');
                      $sql2=("SELECT * FROM view_packages v,rent_lend_categories r where v.cat_id=r.id order by v.cat_id");                           
                      
                      $result2 = mysqli_query($conn, $sql2);
                      $return2=mysqli_num_rows($result2);
                      
                      if($return2 > 0)
                      {


                       while($row2 = mysqli_fetch_assoc($result2))  
                        {  ?>
                        <tr>
                          <td><?php  echo $row2['name']?></td>
                          <td><?php  echo $row2['model_name']?></td>
                          <td><?php  echo $row2['package_no'];   ?></td>
                          <td><?php  echo $row2['start_day'] ?>-<?php echo $row2['end_day'];  ?></td>
                          <td><?php  echo $row2['rate_per_day'];   ?></td>
                          <td><?php  echo $row2['deposite'];   ?></td>

                          <?php  $id = $row2['p_id']; ?>
                            <td>
                   <?php echo '<button class="btn btn-warning btn-xs" onclick="update('.$id.')">Update</button>' ?>
                              
                             <!--  <button class="btn btn-danger btn-xs" value="" data-toggle="modal"
                               data-target="#myModal1<?php echo $row2['p_id']; ?>">Delete</button> -->
                          </td>
                        </tr>



         <!-- Modal 2 -->
                   <!--    <div class="modal fade" id="myModal1<?php echo $row2['p_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                        <!--  <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Delete File</h4>
                            </div>
                            <div class="modal-body">
                              <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              <a href="delete_package_query.php?id=<?php echo $row2['p_id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                            </div>
                          </div>

                        </div>
                      </div> -->
            <!-- modal end -->
 <?php  
                     } }?>   
  <?php       
        }                 
    else if(isset($_POST["search"]))
      {
              
       $category=$_POST['category_name'];
       $ModelName=$_POST['model_name'];
      
        if($category==null && $ModelName==null)
        {
          echo '<script>
          alert("Input Required...");
          </script>';
        }  



        else
        {
                   
         $sql="SELECT * FROM view_packages v,rent_lend_categories r where (v.cat_id=r.id) AND v.cat_id ='".$category."' AND v.model_name='".$ModelName."'"; 
           
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) 
          {
            while($row = mysqli_fetch_assoc($result))
            {   ?> 
                  <tr>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['model_name']?></td>
                    <td><?php echo $row['package_no'];?></td>
                    <td><?php echo $row['start_day'] ?>-<?php echo $row['end_day'];?></td>
                    <td><?php  echo $row['rate_per_day'];?></td>
                     <td><?php  echo $row['deposite'];   ?></td>

                    <?php  $id = $row['p_id']; ?>
                    <td>
                      <button class="btn btn-warning btn-xs" value="" data-toggle="modal"
                       data-target="#myModal<?php echo $row['p_id'];?>" >Update</button>
                              
                      <button class="btn btn-danger btn-xs" value="" data-toggle="modal"
                       data-target="#myModal1<?php echo $row['p_id']; ?>">Delete</button>
                    </td>
                  </tr>

                      
<!-- Modal 1 -->
  <div class="modal fade" id="myModal<?php echo $row['p_id'];?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <!-- Modal header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Package Information</h4>
        </div>
        <!-- /Modal header -->
        
        <!-- Modal Body -->
        <div class="modal-body">
          <form id="demo-form2"  class="form-horizontal form-label-left" action="update_package_query.php" method="POST">

                      <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="category-name">Category Name <span class="required"></span></label>
                      
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                         
                           <!--  <select class="form-control" name="category_id">
                                 <option value=" <?php /* echo $row['id']; ?>">
                                     <?php echo $row['name']; ?>
                                </option>
                                  
                                  <?php
                                    include('config.php');
                                  $sql1=("SELECT  * FROM `rent_lend_categories`"); 
                                  
                                  $result1 = mysqli_query($conn, $sql1);
                                  $return1=mysqli_num_rows($result1);
                                        
                                        if($return1 > 0)
                                        {
                                          while($row1 = mysqli_fetch_array($result1))
                                          {?>
                                               
                                              <option value="<?php echo ($row1['id']); ?>"><?php echo ($row1['name']); ?></option>                                                  
                                    <?php }
                                              
                                        }*/
                                  ?>
                                </select> -->

                                 <input type="text" name="" value="<?php echo ($row['name']); ?>" required="required" class="form-control col-md-7 col-xs-12 form-group" readonly="readonly">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="package no">Package No <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input type="text" name="" value="<?php echo $row['package_no'];?>" required="required" class="form-control col-md-7 col-xs-12 form-group" readonly="readonly">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12 form-group">No of Days(Range)</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                          <input  type="text" name="start" value="<?php echo $row['start_day'];?>" required="required" class="form-control col-md-4 col-xs-12 form-group">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                         <input type="text" name="end" value="<?php echo $row['end_day'];?>" 
                         required="required" class="form-control col-md-4 col-xs-12 form-group">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="last-name">Rate per Day <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                          <input type="text"  name="rate" value="<?php echo $row['rate_per_day'];?>" required="required" class="form-control col-md-7 col-xs-12 form-group">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="last-name">Deposite <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                          <input type="text"  name="deposite" value="<?php echo $row['deposite'];?>" required="required" class="form-control col-md-7 col-xs-12 form-group">
                        </div>
                      </div>
                     
                        <!-- <div class="ln_solid"></div> -->
                        <div class="form-group">
                        <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-5">
                          <button type="submit" name="submit" value="<?php echo $row['p_id']; ?>" class="btn btn-success">Submit</button>
                          <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                         
                        </div>
                      </div>
                      -

            </form>
        </div> <!--    Modal Body -->


        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>  <!-- Modal content -->
      
    </div>
  </div>

  <!-- /modal 1 end -->


         <!-- Modal 2 -->
                      <div class="modal fade" id="myModal1<?php echo $row['p_id']; ?>" role="dialog">
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
                              <a href="delete_package_query.php?id=<?php echo $row['p_id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                            </div>
                          </div>

                        </div>
                      </div>
            <!-- modal end -->


                <?php   }}}}
                
                  ?>
           















                      </tbody>
                    </table>   


                <!-- </div> -->



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


 

<script type="text/javascript">



$(document).ready(function() {
    var table =  $('#datatable-fixed-header1').DataTable( {

     // dom: 'lrtip'
    // 'searching':false;
    } );

    //  $('#iface').on('change', function(){
    //    table.search(this.value).draw();   
    // });

    //   $('#ModelName').on('mouseout', function(){
    //    table.search(this.value).draw();   
    // });
} );

</script>



  <script >
      
      $(document).ready(function(){

      $('#type2').on("change",function () {
        var categoryId = $(this).find('option:selected').val();
      alert(categoryId);
        $.ajax({
        
          url: "view_package_model_ajax.php?categoryId="+categoryId,
          type: "POST",
      
          success: function (response) {
            console.log(response);
            $("#type3").html(response);
          },
        });
      }); 
    });
  </script>



  </body>
</html>