
<?php
require_once('config.php');

if(isset($_POST["submit"]))
{ 

$id=$_POST['submit'];
$min_pic=$_POST['min_pic'];
$max_pic=$_POST['max_pic'];
$price_per_pic=$_POST['price_per_pic'];
$no_of_hrs=$_POST['no_of_hrs'];
$five_pic_price=$_POST['five_pic_price'];
$travel_allowance=$_POST['travel_allowance'];



$sql="UPDATE photoshoot_package SET min_pic='$min_pic',max_pic='$max_pic',price_per_pic='$price_per_pic',no_of_hrs='$no_of_hrs',five_pic_price='$five_pic_price', travel_allowance='$travel_allowance' WHERE id=".$id."";


if ($conn->query($sql) === TRUE)
 {
   
   echo '<script>

   			alert("Updated Successfully !");
   		  window.location = "view_photoshoot_package.php";
								
		</script>';
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


?>




