<?php
include('config.php');
// $id = $_GET['id'];
// $DelSql = "DELETE FROM rent_details WHERE id =".$id."";
// $res = mysqli_query($conn, $DelSql);
// if($res){
	
// 	echo '<script>

//    			alert("Deleted Successfully !");
//    			window.location = "rejected_rent_request.php";
								
// 		</script>';
// }else{
// 	echo "Failed to delete";
	
// }

if(isset($_POST['emp_id'])) {
	$emp_id = trim($_POST['emp_id']);	
    $sql = "DELETE FROM rent_details WHERE id in ($emp_id)";
	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	echo $emp_id;
}
?>
