<?php
require('config.php');
session_start();

if (isset($_POST['submit'])){

   $username = stripslashes($_REQUEST['username']);

   $username = mysqli_real_escape_string($conn,$username);
   $password = stripslashes($_REQUEST['password']);
   $password = mysqli_real_escape_string($conn,$password);

   $query = "SELECT * FROM admin WHERE username='$username' and password='$password'";
   $result = mysqli_query($conn,$query) or die(mysql_error());
   $count = mysqli_num_rows($result);
     
   if($count==1){
    
   $row=mysqli_fetch_array($result);
   
   $_SESSION['username'] = $row['username'];
   $_SESSION['id'] = $row['id'];
   
   header("Location: home.php");
  
   }else{
          
   header("Location: index.php?message=Invalid User Name or Password !");
   }
}
?>