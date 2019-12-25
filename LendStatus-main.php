<?php 
require_once "config.php";


    if(isset($_POST["ver"]))
    {
      	$id = $_POST['ver'];

			$sql = "update lend_details SET ad_verify ='1' where id=$id";

				if ($conn->query($sql) === TRUE)
				{
				   
				   echo '<script>

				   		  alert("Verified Successfully !");
				   		  window.location = "lend_camera_registration.php";
												
						</script>';

				} 
	}

	  if(isset($_POST["verify"]))
    {
      	$id = $_POST['verify'];

			$sql = "update lend_details SET ad_verify ='1' where id=$id";

				if ($conn->query($sql) === TRUE)
				{
				   
				   echo '<script>

				   		  alert("Verified Successfully !");
				   		  window.location = "lend_camera_registration.php";
												
						</script>';

				} 
	}


	// elseif(isset($_POST["verify"]))
 //    {
 //      	$id = $_POST['verify'];
 //      	$model_name = $_POST['model_name'];


	// 		$sel_sql = "SELECT * FROM lend_details WHERE id = $id";
 //      		$res = mysqli_query($conn, $sel_sql);
 //      		$row = mysqli_fetch_assoc($res);
      


 //      		if ($row['model_name'] == $model_name ) 
 //      		{

	// 			$sql = "update lend_details SET ad_verify ='1' where id=$id";

	// 			if ($conn->query($sql) === TRUE)
	// 			{
				   
	// 			   echo '<script>

	// 			   		  alert("Verified Successfully !");
	// 			   		  window.location = "lend_camera_registration.php";
												
	// 					</script>';

	// 			} 
				
	// 		}

      	   
 //      	    else {

 //      			$up = "UPDATE lend_details SET model_name = '$model_name' WHERE id = $id";
 //      			$result = mysqli_query($conn, $up);

	//       		echo '<script>
	// 				alert("Model Name Updated Successfully !");
	// 			    // window.location = "lend_camera_registration.php";						
	// 				</script>';

	// 			$sql = "update lend_details SET ad_verify ='1' where id=$id";
	// 			if ($conn->query($sql) === TRUE)
	// 			 {
	// 			   echo '<script>
	// 			   		  alert("Verified Successfully !");
	// 			   		  window.location = "lend_camera_registration.php";					
	// 					</script>';
	// 				} 
	// 		}
	// }

 if(isset($_POST["update"])) {

      	$id = $_POST['update'];
      	$model_name = $_POST['model_name'];
  
      		//$sql = "update lend_details SET ad_verify ='0' where id=$id";
      		$sql = "UPDATE lend_details SET model_name = '$model_name' WHERE id = $id";

			if ($conn->query($sql) === TRUE)
			 {
			   
			   echo '<script>

			   		  alert("Model Name Updated Successfully !");
			   		  window.location = "lend_camera_registration.php";
											
					</script>';
			} 
			else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
      	

      } 








if(isset($_POST["reject"])) {

      	$id = $_POST['reject'];

      		$sql = "update lend_details SET ad_verify ='0' where id=$id";

			if ($conn->query($sql) === TRUE)
			 {
			   
			   echo '<script>

			   		  alert("Rejected Successfully !");
			   		  window.location = "lend_camera_registration.php";
											
					</script>';
			} 
			else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
      	

      }
     
?>