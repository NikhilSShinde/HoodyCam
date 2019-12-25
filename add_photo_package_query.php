
<?php
require_once('config.php');

if(isset($_POST["submit"]))
{ 

$cat_id=$_POST['category_id'];
$sub_cat_id=$_POST['sub_category'];
$pack_no=$_POST['package_no'];
$min_pic=$_POST['min_pic'];
$max_pic=$_POST['max_pic'];
$price_per_pic=$_POST['price'];
$no_of_hrs=$_POST['hrs'];
$five_pic_price=$_POST['fivepicprice'];
$travel_allowance=$_POST['allowance'];






$sql = "INSERT INTO  photoshoot_package 
(pack_no,cat_id,sub_cat_id,min_pic,max_pic,price_per_pic,no_of_hrs,five_pic_price,travel_allowance) VALUES ('$pack_no','$cat_id','$sub_cat_id','$min_pic','$max_pic','$price_per_pic','$no_of_hrs','$five_pic_price','$travel_allowance')";


if ($conn->query($sql) === TRUE)
 {
   
   echo '<script>

   		  alert("Added Successfully !");
   		  window.location = "add_photoshoot_package.php";
								
		</script>';
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}
?>




