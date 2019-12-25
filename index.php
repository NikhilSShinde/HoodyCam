<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login </title>

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

  .panel{
    border:none;
  }

    </style>

 <script type="text/javascript"> function myFunction() {

    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var ok = true;
    if (pass1 != pass2) {
        alert("Passwords do not match !");
        document.getElementById("pass1").style.borderColor = "#E34234";
        document.getElementById("pass2").style.borderColor = "#E34234";
        ok = false;
    }
    else {
        //alert("Passwords Match!!!");
    }
    return ok;
    }
</script>   
  </head>

  <body class="login" style="background-color: #73879C;">
    
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="login_query.php" method="post">
              
             
            <?php
             
            if(empty($_GET))
            { }
            else{
             $msg="";
             $msg= $_GET['message'];
            
             ?>
             <div class="alert alert-danger" role="alert">
                <?php echo $msg;?>
              </div>  
            <?php } ?>
           
              
  <div class="col-md-12">
    <div class="login-panel panel panel-default">
      <div class="panel-heading" style="text-align: left"><span>Log in</span></div>
        <div class="panel-body">
         
          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback-left">
              <input type="text" name="username" class="form-control has-feedback-left" placeholder="Username" required="required"><span class="fa fa-user form-control-feedback left" aria-hidden="true" style="color: #73879C;"></span>
          </div>
             

          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback-left">
            <input type="password" name="password" class="form-control has-feedback-left" id="" placeholder="Password" required="required">
            <span class="fa fa-lock form-control-feedback left" aria-hidden="true" style="color: #73879C;"></span>
          </div>
              
          <button  type="submit" class="btn btn-primary btn-md" value="login" name="submit">Sign in</button>

          <div class="separator">
              <div class="clearfix"></div>
              <div>
              <p>©2018 All Rights Reserved | Crafted by<a href="http://softianstech.com">Softians Technologies</a></p>
              </div>
          </div>
      </div>
    </div>
  </div>
          
          
            </form>
          </section>
        </div>


      </div>
    
  </body>
</html>
