<?php
  session_start();
  $id =  $_SESSION['id'];
  
  if(!isset($id)){
    header('location:index.php');
   }

?>

<?php
include('config.php');
 $sql= "SELECT * FROM `admin` where id='".$id."'";  
 $result = mysqli_query($conn, $sql); 
 $row=mysqli_fetch_array($result);

if(isset($_POST['send']))
{    
          
          $new_name=$_POST['new_username'];
          $pass=$_POST['password'];

         if(($row['password']== $pass))
          {
           
            $sql="UPDATE `admin` SET `username` = '".$new_name."' WHERE id='".$id."'";
      
            if(mysqli_query($conn, $sql))
            {
              echo '<script>
                alert("Username Updated Successfully");
                 window.location = "settings.php";
                </script>';
         
            mysqli_close($conn);
          }
          }

          else{
              
            echo '<script>
              alert("Invalid Password");
              </script>';
            
            mysqli_close($conn);
          } 
}

if(isset($_POST['submit']))
{    
          $old_pass =$_POST['old_pass'];
          $new_pass =$_POST['new_pass'];
          $conf_pass=$_POST['confirm_pass'];

         
          if($row['password']==$old_pass)
          {
            if($new_pass==$conf_pass)
            {               
              $sql= "UPDATE `admin` SET `password`='".$new_pass."' WHERE id='".$id."'";
      
          if(mysqli_query($conn, $sql))
          {
            echo '<script>
                alert("Password Updated Successfully");
                 window.location = "settings.php";
                
              </script>';
          
            mysqli_close($conn);
          }}
          else{
            echo '<script>
              alert("Password Mismached..");
              
              </script>';
            
            mysqli_close($conn);
          }
        }

        else{
            echo '<script>
              alert("Old Password is Wrong..");
              </script>';
            
            mysqli_close($conn);
          }

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

    <title>Settings</title>

    <?php include('header/header.php'); ?>
 

    <style type="text/css">
      .login_wrapper {
    
    margin: 0% auto 0;
    
}
.form-group {
    margin-bottom: 2px;
}

.panel-default>.panel-heading {
   
    background-color: #2A3F54;
    color:#ECF1F1!important;
    /*border-color: #ddd;*/
}

.panel-heading{
   background-color: #2A3F54;
    color:#ECF1F1!important;
}
  .panel{
    border:none;
  }


  .panel-body {
    padding: 15px;
    background-color: #ededed;
}

    </style>

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
 
        <div class="col-md-12 col-sm-12 col-md-12">
          <div class="x_panel" style="margin-top: 57px;">
            <div class="x_content">
             

<div class="row">
 <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3" >
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-user"></i> Manage Account</h2>
        <div class="clearfix"></div>
    </div>
    
<div class="x_content">

<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">User Name</a>
    </li>
    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Password</a>
    </li>
  </ul>
   
  
<div id="myTabContent" class="tab-content">
  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
    <section class="wrapper">
      <div class="col-md-12  ">
        <form action="" method="post">
          <div class="panel panel-default">
            <div class="panel-heading" style="text-align: left">
              <span>Update User Name</span></div>
                
        <div class="panel-body">
               
          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback-left">
              <input type="text" class="form-control has-feedback-left"  value="<?php echo $row['username']; ?>" required="required" readonly="readonly"><span class="fa fa-user form-control-feedback left" aria-hidden="true" style="color: #73879C;"></span>
          </div>

           <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback-left">
              <input type="text" name="new_username" class="form-control has-feedback-left" placeholder="New User Name" required="required"><span class="fa fa-user form-control-feedback left" aria-hidden="true" style="color: #73879C;"></span>
          </div>

          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback-left">
              <input type="password" name="password" class="form-control has-feedback-left" placeholder="Password" required="required"><span class="fa fa-lock form-control-feedback left" aria-hidden="true" style="color: #73879C;"></span>
          </div>
           
         
          <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="ln_solid"></div>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <input type="submit" class="btn btn-primary" name="send" value="Update">
          </div>
        
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
                        

<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
<section class="wrapper">
        <div class="col-md-12  ">
        <form action="" method="post">
          <div class="panel panel-default">
            <div class="panel-heading" style="text-align: left">
              <span>Update Password</span></div>
              
        <div class="panel-body">
               
          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback-left">
              <input type="password" name="old_pass" class="form-control has-feedback-left" placeholder="Old Password" required="required"><span class="fa fa-lock form-control-feedback left" aria-hidden="true" style="color: #73879C;"></span>
          </div>

          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback-left">
              <input type="password" name="new_pass" class="form-control has-feedback-left" placeholder="New Password" required="required"><span class="fa fa-lock form-control-feedback left" aria-hidden="true" style="color: #73879C;"></span>
          </div>

           <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback-left">
              <input type="password" name="confirm_pass" class="form-control has-feedback-left" placeholder="Confirm Password" required="required"><span class="fa fa-lock form-control-feedback left" aria-hidden="true" style="color: #73879C;"></span>
          </div>
           
         
         <div class="col-md-12 col-sm-12 col-xs-12">
           <div class="ln_solid"></div>
                  <button type="reset" class="btn btn-default">Reset</button>
                  <input type="submit" class="btn btn-primary" name="submit" value="Update">
              </div>
                </div>
              </div>
            </form>
          </div>
  </section>
</div>

</div>
                  
</div>
                        
</div>
</div>
</div> <!-- /.col-md-6-->
</div> <!-- /.row-->






         

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