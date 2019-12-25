
<?php
require_once('config.php');

if(isset($_POST["submit"]))
{ 

$id=$_POST['submit'];
$start=$_POST['start'];
$end=$_POST['end'];
$rate_per_day=$_POST['rate'];
//$deposite=$_POST['deposite'];



if($_POST['deposite']== "" && $package_no != '1' ){
  $description=null;
  $deposite=null;
}
else
{
  $description = $_POST['desc'];
  $deposite=$_POST['deposite'];
}


$sql="update view_packages SET start_day='$start',end_day='$end',rate_per_day='$rate_per_day',deposite='$deposite',description='$description' where p_id=".$id."";


if ($conn->query($sql) === TRUE)
 {
   
   echo '<script>

   			alert("Updated Successfully !");
   		  window.location = "view_packages.php";
								
		</script>';
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


?>




