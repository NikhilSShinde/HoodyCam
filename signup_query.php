<?php
include_once'config.php';


if(!empty($_POST["submit"]))

{
$p_name=ucwords(strtolower($_POST['p_name']));
$f_name=ucwords(strtolower($_POST['f_name']));
$m_number=$_POST['m_number'];
$a_number=$_POST['a_number'];
$email=$_POST['email'];
$password=$_POST['password'];
$c_password=$_POST['c_password'];

/*****  file upload script ******/
// $default_img = 'assets/images/user.png';
/*$file_upload="true";
$file_up_size=$_FILES['image']['size'];

$file_name=time().'_'.basename($_FILES['image']['name']);


if ($_FILES['image']['size']>250000){$msg=$msg."Your uploaded file size is more than 250KB
 so please reduce the file size and then upload.<BR>";
$file_upload="false";}

if (!($_FILES['image']['type'] =="image/jpeg" OR $_FILES['image']['type'] =="image/gif" OR $_FILES['image']['type'] =="image/png" OR $_FILES['image']['type'] =="image/jpg" OR $_FILES['image']['type'] =="image/ico"))
{//$msg=$msg."Your uploaded file must be of JPG or GIF or PNG or ICO. Other file types are not allowed<BR>";
$file_upload="false";}

$file_name=$_FILES['image']['name'];
$add="assets/images/user_image/$file_name"; // the path with the file 'name' where the file will be stored
// $default_img = $add.'user.png';
if($file_upload=="true"){

if(move_uploaded_file ($_FILES['image']['tmp_name'], $add)){
// do your coding here to give a thanks message or any other thing.
}else{echo "Failed to upload file Contact Site admin to fix the problem";}

}else{
// echo $msg;
}  */





$sql = "insert into signup(p_name,f_name,m_number,a_number,email,password,c_password) values('$p_name','$f_name','$m_number','$a_number','$email','$password','$c_password')";

/*$sql = "insert into signup(p_name,f_name,m_number,a_number,email,password,c_password,image) values('$p_name','$f_name','$m_number','$a_number','$email','$password','$c_password','$file_name')"; */

if ($conn->query($sql) === TRUE)
 {
   echo '<script>

   			alert("Registered Successfully !");
   			 window.location = "index.php";
								
		</script>';
  
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}


?>