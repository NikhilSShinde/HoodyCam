
<?php
require_once('config.php');

if(isset($_POST["submit"]))
{ 

$model_name = $_POST['model_name'];
$category_id=$_POST['category_id'];
$package_no=$_POST['package_no'];
$start=$_POST['start'];
$end=$_POST['end'];
$rate_per_day=$_POST['rate'];
//$deposite = $_POST['deposite'];


if($_POST['deposite']== "" && $package_no != '1' ){
  $description=null;
  $deposite=null;
}
else
{
  $description = $_POST['desc'];
  $deposite = $_POST['deposite'];

}


$sql1 = "SELECT * from view_packages where cat_id='".$category_id."' and model_name='".$model_name."'";
$result1 = mysqli_query($conn, $sql1);
$return1=mysqli_num_rows($result1);
                      
if($return1 > 0)
{
    while($row1 = mysqli_fetch_assoc($result1)) 
    { 
         if($row1['package_no'] == '1')
         {
               $deposite=$row1['deposite'];

         }
    }

}


$sql = "insert into view_packages(cat_id,model_name,package_no,start_day,end_day,rate_per_day,deposite,description) values('$category_id','$model_name','$package_no','$start','$end','$rate_per_day','$deposite', '$description')";


if ($conn->query($sql) === TRUE)
 {
   
   echo '<script>

   		  alert("Added Successfully !");
   		  window.location = "add_packages.php";
								
		</script>';
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}
?>




