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

    <title>View Package</title>

    <?php include('header/header.php'); ?>
  
    <script>
        function f1(){
              var type2 = $("#type2").find('option:selected').val();
              if(type2=="")
              {
                 alert("Select Category and Model Name");
                 return false;
              } 
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
       
            <div class="row">
             
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="margin-top: 57px;">
                <div class="x_content">
                <div class="row">
                
                <span class="section">View PhotoShoot Package</span>

                <div class="row">
                  <form action="" class="form-horizontal form-label-left" method="POST" onsubmit="return f1()">
                    
                  <div class="item-form-group">
                    
                    <label class="control-label  col-md-2 col-sm-2 col-xs-12" for="Category name">Category</label>
                                          
                      <div class="col-md-3 col-sm-3 col-xs-12 form-group">
                      
                        <select class="form-control" name="category_name" id="type2">
                        <option value="">SELECT</option>
                                    
                        <?php

                         include('config.php');
                          $sql1=("SELECT  * FROM  photo_categories");

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
                                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Sub-Category</label>
                                  <div class="col-md-3 col-sm-3 col-xs-12 form-group">      
                                       <select  id="type3" name="sub_cat_id" class="form-control">
                                         
                                       </select>
                                  </div>     
                              
                            <div class="col-md-2 col-sm-2 form-group">       
                              <button class="btn btn-primary btn-md" name="search">Search</button>
                           
                            </div>
                          </div>
                 </form>
            
                 </div>  
              <br/>


                   <table id="datatable-fixed-header1" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px;">Sr.No</th>
                          <th>Category</th>
                          <th>Sub-Category</th>
                          <th>Package No</th>
                          <th>Min-Max Pic (Range)</th>
                          <th>Price per pic</th>
                          <th>No of hrs</th>
                          <th>Price (1st Five Pic)</th>
                          <th>Travel Allowance</th>
                          <th>Action</th>
                     
                         
                        </tr>
                      </thead>
                <tbody>

         

    <?php       global $category;
                global $ModelName;
                
                  $category="";
                  $ModelName="";
                           
        include("config.php");
        
        if(!isset($_POST["search"]) || isset($_POST["search"]) )
          {
           
           if(isset($_POST["search"]))
           {
              $category=$_POST['category_name'];

              if(isset($_POST['sub_cat_id'])==null)
              {
                 $sub_cat_id="";
              }
              else
              {
                 $sub_cat_id=$_POST['sub_cat_id'];
              } 
              
             $sql2="SELECT *,p.id as p_id FROM photoshoot_package p , photo_categories c, photo_sub_cat sc WHERE c.id=p.cat_id AND sc.id=p.sub_cat_id and (p.cat_id like '".$category."%' and p.sub_cat_id like '".$sub_cat_id."%' ) order by p.id desc";

             // $sql2="SELECT * FROM photoshoot_package p,  photo_categories c, photo_sub_cat sc where(p.cat_id=c.id) AND p.cat_id ='".$category."' AND sc.id = '".$sub_cat_id."'";
           }
           else
           {
              $sql2= "SELECT *,p.id as p_id FROM photoshoot_package p , photo_categories c, photo_sub_cat sc WHERE c.id=p.cat_id AND sc.id=p.sub_cat_id order by p.id desc";
           }
           
              $result2 = mysqli_query($conn, $sql2);
              $return2=mysqli_num_rows($result2);
              
              if($return2 > 0)
              {
                    $count = 0;

               while($row2 = mysqli_fetch_assoc($result2))  
                { 

                    $count++;

                ?>
                <tr>
                  <td><?php  echo $count; ?></td>
                  <td><?php  echo $row2['name']?></td>
                  <td><?php  echo $row2['cat_name']?></td>
                  <td><?php  echo $row2['pack_no'];   ?></td>
                  <td><?php  echo $row2['min_pic'] ?>-<?php echo $row2['max_pic']; ?></td>
                  <td><?php  echo $row2['price_per_pic'];   ?></td>
                  <td><?php  echo $row2['no_of_hrs']?></td>
                  <td><?php  echo $row2['five_pic_price']?></td>
                  <td><?php echo $row2['travel_allowance']?></td>


                  <?php  $id = $row2['p_id']; ?>

                  <td>
                    <button class="btn btn-warning btn-xs" id="update<?php echo $row2['package_no'];?><?php echo $row2['model_name'] ?>" data-toggle="modal" data-target="#myModal<?php echo $row2['p_id'];?>">Update
                    </button>
              
               
                     <!--  <button class="btn btn-danger btn-xs" value="" data-toggle="modal"
                       data-target="#myModal1<?php echo $row2['p_id']; ?>">Delete</button> -->
                  </td>
                </tr>
<!-- Modal 1 -->
  <div class="modal fade" id="myModal<?php echo $row2['p_id'];?>" role="dialog">
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
          <form id="demo-form2"  class="form-horizontal form-label-left" action="update_photo_package.php" method="POST">

                      <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="category-name">Category<span class="required"></span></label>
                      
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                          <input type="text" name="" value="<?php echo ($row2['name']); ?>" class="form-control col-md-7 col-xs-12 form-group" readonly="readonly">
                        </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="category-name">Sub Category<span class="required"></span></label>
                      
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                          <input type="text" name="" value="<?php echo ($row2['cat_name']); ?>"  class="form-control col-md-7 col-xs-12 form-group" readonly="readonly">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="package no">Package No <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" name="" value="<?php echo $row2['pack_no'];?>" required="required" class="form-control col-md-7 col-xs-12 form-group" readonly="readonly">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12 form-group">Min-Max Picture(Range)</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                          <input  type="text" name="min_pic" value="<?php echo $row2['min_pic'];?>" required="required" class="form-control col-md-4 col-xs-12 form-group">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                         <input type="text" name="max_pic" value="<?php echo $row2['max_pic'];?>" 
                         required="required" class="form-control col-md-4 col-xs-12 form-group">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="last-name">Price Per Picture <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                          <input type="text"  name="price_per_pic" value="<?php echo $row2['price_per_pic'];?>" required="required" class="form-control col-md-7 col-xs-12 form-group">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="last-name">No of hours<span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                          <input type="text"  name="no_of_hrs" value="<?php echo $row2['no_of_hrs'];?>" required="required" class="form-control col-md-7 col-xs-12 form-group">
                        </div>
                      </div>

                  

                      <div class="form-group" id="des<?php echo $row2['package_no'];?><?php  echo $row2['model_name']?>">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="last-name">Price (1st five pic) <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                          <input type="text"  name="five_pic_price" value="<?php echo $row2['five_pic_price'];?>" class="form-control col-md-7 col-xs-12 form-group">
                        </div>
                      </div>


                      <div class="form-group" id="des<?php echo $row2['package_no'];?><?php  echo $row2['model_name']?>">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="last-name">Travel Allowance <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                          <input type="text"  name="travel_allowance" value="<?php echo $row2['travel_allowance'];?>" class="form-control col-md-7 col-xs-12 form-group">
                        </div>
                      </div>
                     
                        <!-- <div class="ln_solid"></div> -->
                        <div class="form-group">
                        <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-5">
                          <button type="submit" name="submit" value="<?php echo $row2['p_id']; ?>" class="btn btn-success">Submit</button>
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
        }
      }
    }                 
    
 ?>       


                      </tbody>
                    </table>   

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
 });
});

</script>

<script >
      
      $(document).ready(function(){

      $('#type2').on("change",function () {
        var categoryId = $(this).find('option:selected').val();
    
         if(categoryId=="")
        {
            $('#type3').empty();
             
        }
        else{
        $.ajax({
        
          url: "view_sub_cat_ajax.php?categoryId="+categoryId,
          type: "POST",
          success: function (response) {
            console.log(response);
            $("#type3").html(response);
          },
        });
       }
      }); 
   
    });
  </script>

  </body>
</html>