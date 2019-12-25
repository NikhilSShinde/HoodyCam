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

    <title>Add Package</title>

    <?php include('header/header.php'); 


 
    ?>
 

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
                      <form class="form-vertical form-label-right" method="post" action="add_package_query.php">
                       <span class="section">Add Package</span>
                       <div class="col-md-1"></div>
                            
                        <div class="col-md-10 col-sm-12 col-xs-12 form-group">
                        
                        <div class="row"> 
                         <div class="item-form-group">
                              
                              <label class="control-label col-md-4 col-sm-12 col-xs-12" for="first-name">Category Name<span class="required">*</span></label>
                                          
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                  
                                  <select class="form-control" id="type2" name="category_id" required="required">
                                     <option value="">SELECT</option>                                
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
                                              
                                            }
                                  ?>
                                  </select>
                                </div>
                          </div>

                           <div class="clearfix"></div> 

              <div class="item-form-group">
                <label class="control-label col-md-4 col-sm-12 col-xs-12" for="first-name">Model Name<span class="required">*</span>
                </label>
              
               <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                <select id="type3" name="model_name" class="form-control" required="required">


                </select>
                </div>
              </div>

                    <div class="item-form-group">
                            <label class="control-label col-md-4 col-sm-12 col-xs-12" for="first-name">Package No<span class="required">*</span></label>
                             <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <select class="form-control" name="package_no" required="required"  id="type4">
                                </select>
                              </div>
                     </div>
                     
                            <div class="clearfix"></div> 
                         <div class="item-form-group">
                              
                              <label class="control-label col-md-4 col-sm-12 col-xs-12 " for="first-name">No of Days(Range)<span class="required">*</span></label>
                                          
                                   <div class="col-md-3 col-sm-12 col-xs-12 form-group"> 
                                        <input type="text" name="start" placeholder="e.g. 1" class="form-control" required="required">
                                      </div>
                                     
                                      <div class="col-md-3 col-sm-12 col-xs-12 form-group"> 
                                        <input type="text" name="end" placeholder="e.g. 10" class="form-control" required="required">
                                      </div>
                          </div>
                                 <div class="clearfix"></div> 
                                
                          <div class="item-form-group">
                                  <label class="control-label col-md-4 col-sm-12 col-xs-12" for="first-name">Rate per day<span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                      <input type="text" name="rate" placeholder="Rate" class="form-control" required="required">
                                  </div>
                          </div>

                          <div class="item-form-group" id="depo">
                                  <label class="control-label col-md-4 col-sm-12 col-xs-12" for="first-name">Deposite<span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                      <input type="text" name="deposite" placeholder="Deposite Amount" class="form-control">
                                  </div>
                          </div>

                          <div class="item-form-group" id="desc">
                                  <label class="control-label col-md-4 col-sm-12 col-xs-12" for="first-name">Description<span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                      <input type="text" name="desc" placeholder="Product Description" class="form-control" >
                                  </div>
                          </div>
                      </div>
                      

                       <div class="row">
                        <div class="ln_solid"></div>
                          <div class="col-md-6 col-md-offset-5">
                            <button id="send" type="submit" name="submit" class="btn btn-success">Add</button>
                            <!-- <button type="submit" class="btn btn-warning">Update</button> -->
                            <button type="reset" class="btn btn-primary">Clear</button>
                          </div>
                       </div><br>
                       
                  </div><!--/.col-md-10 -->
                  <div class="col-md-1"></div> 
                   </form> <!--/form -->  
                        
            

                </div>
              </div>
            </div>
          </div>
      </div> <!-- /page content -->

</div>
</div>

     <!--footer -->
        <?php include('footer/footer.php'); ?>
     <!-- /footer -->

  <script>
      
  $(document).ready(function(){
  
      $("#desc").hide();
      $("#depo").hide();
      
      $('#type2').on("change",function () {
        var categoryId = $(this).find('option:selected').val();
    
        if(categoryId=="")
        {
            $('#type3').empty();
            $('#type4').empty();
            $('#desc').hide();
            $("#depo").hide();   
        }
        else{
              $.ajax({
                  url: "model_ajax.php?categoryId="+categoryId,
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
        var modelName = $(this).find('option:selected').val();

         if(modelName=="")
        {
            $('#type4').empty();
            $('#desc').hide();
            $("#depo").hide();   
        }
        else
        {
            $.ajax({
            url: "package_no_ajax.php?categoryId="+categoryId+"&modelName="+modelName,
            type: "POST",
            success: function (response) {
              console.log(response);
              $("#type4").html(response);
            },
          });
        }
      
      }); 

      
      $('#type4').on("change",function () {
        
        var packageNo = $('#type4').val();

        if(packageNo == 1)
        {
            $("#desc").show();
            $("#depo").show();
        } else {
            $("#desc").hide();
            $("#depo").hide();

        }
        
        });


         $('#type2').on("change",function () {

          $("#desc").hide();
          $("#depo").hide();
          $('#type4').empty();

         }); 

          $('#type3').on("change",function () {

          $("#desc").hide();
          $("#depo").hide();
         }); 
       
  });

  </script>  
</body>
</html>

