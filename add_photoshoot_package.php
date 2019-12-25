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

    <title>Photohsoot Package</title>

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
              <div class="col-md-12">
                <div class="x_panel" style="margin-top: 57px;">
                  <div class="x_content">
                     <!--    <div class="row">    -->
                   
                    <form action="add_photo_package_query.php" method="POST" class="form-horizontal form-label-left" novalidate>

                     <span class="section">Add Package</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Category
                        </label>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            
                        <select class="form-control" id="type2" name="category_id" required="required">
                          <option value="">SELECT</option>
                            <?php
                                    include('config.php');
                                    $sql=("SELECT  * FROM photo_categories");
                                    $result = mysqli_query($conn, $sql);
                                    $return=mysqli_num_rows($result);
                                    
                                    if($return > 0)
                                    {
                                      while($row = mysqli_fetch_array($result))
                                       {  ?>
                                          <option value="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></option>                                                  
                                          <?php }
                                        }
                              ?>
                        </select>
                                          
                        </div>
                      </div>
                        
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub-Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="type3" name="sub_category" class="form-control" required="required">
                                                
                        </select>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Package</label>
                      
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="type4" name="package_no" class="form-control" required="required">
                                               
                        </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Range
                        </label>
                        
                        <div class="col-md-3 col-sm-3 col-xs-12 form-group">
                          
                          <input type="text" id="number" name="min_pic" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" placeholder="Min">
                          
                          

                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 form-group">
                          
                          <input type="text" id="number" name="max_pic" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" placeholder="Max">
                          
                          

                        </div>





                      </div>
                     <!--  <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Price per Day
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="url" id="website" name="website" required="required" placeholder="www.website.com" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div> -->
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Price per Pic
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="occupation" type="text" name="price" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Number of Hour</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="text" name="hrs" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Price for 1st 5 pic</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="text" name="fivepicprice" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Traveling Allowance</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" name="allowance" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-5">
                          
                          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                          <button type="reset" class="btn btn-warning">Clear</button>
                        </div>
                      </div>
                    </form>
                




               <!--     </div>   -->
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
      
  $(document).ready(function(){
     
      $('#type2').on("change",function () {
        var categoryId = $(this).find('option:selected').val();
    
        if(categoryId=="")
        {
            $('#type3').empty();
            $('#type4').empty();
          
        }
        else{
              $.ajax({
                  url: "sub_cat_ajax.php?categoryId="+categoryId,
                  type: "POST",
                  success: function (response) {
                  console.log(response);
                  $("#type3").html(response);
                },
              });
            }
        }); 
    
       
        $('#type3').on("change",function () {
        
        var categoryId= $('#type2').val();
        var sub_category = $(this).find('option:selected').val();
        // alert("categoryId:"+categoryId);
        // alert("sub_category:"+sub_category);
 
         
         if(sub_category=="")
        {
            $('#type4').empty();
            // $('#desc').hide();
            // $("#depo").hide();   
        }
        else
        {
            $.ajax({
            url: "photo_package_no_ajax.php?categoryId="+categoryId+"&sub_category="+sub_category,
            type: "POST",
            success: function (response) {
              console.log(response);
              $("#type4").html(response);
            },
          });
        }
      
      }); 

      
      // $('#type4').on("change",function () {
        
      //   var packageNo = $('#type4').val();

      //   if(packageNo == 1)
      //   {
      //       $("#desc").show();
      //       $("#depo").show();
      //   } else {
      //       $("#desc").hide();
      //       $("#depo").hide();

      //   }
        
      //   });


         $('#type2').on("change",function () {

          // $("#desc").hide();
          // $("#depo").hide();
          $('#type4').empty();

         }); 

         //  $('#type3').on("change",function () {

         //  $("#desc").hide();
         //  $("#depo").hide();
         // }); 
       
  });

  </script>  

  </body>
</html>