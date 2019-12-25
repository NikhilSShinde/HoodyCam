<?php
require_once('config.php');
$id = $_GET['id'];
$DelSql = "DELETE FROM `view_packages` WHERE p_id=$id";
$res = mysqli_query($conn, $DelSql);
if($res){
	
	echo '<script>

   		
   			window.location = "view_packages.php";
								
		</script>';
}else{
	echo "Failed to delete";
}
?>