<?php 
require_once "config.php";


    if(isset($_POST["active"]))
    {
      	$id = $_POST['active'];

			$sql = "update lend_details SET ad_active ='1' where id=$id";

				if ($conn->query($sql) === TRUE)
				{

					$query1 = "SELECT model_name,mobile1 FROM lend_details WHERE id='".$id."'";
					$result1 = mysqli_query($conn, $query1);
					$row1 = mysqli_fetch_assoc($result1);

					$modelName = $row1['model_name'];
					$number = $row1['mobile1'];

/*********************** send message code start   *************************/
    
    // Authorisation details.
	$username = "hoodycampune@gmail.com";
	$hash = "eaecfa79162e30f83877d85dada9df135552b903047de6d22321135113ea4312";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "HDYCAM"; // This is who the message appears to be from.
	$numbers = $number; // A single number or a comma-seperated list of numbers
	$message = "Hello,

Your item $modelName is successfully registered to HoodyCam. If you want to remove your item, please call on +91-8459216984

Team,
HoodyCam";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);

    	
    /*********************** send message code end   *************************/


				   
				   echo '<script>

				   		  alert("Activated Successfully !");
				   		  window.location = "user_accept.php";
												
						</script>';

				}
				else{
				 	echo 'error';
				 } 
	}



    if(isset($_POST["inactive"]))
    {
      	$id = $_POST['inactive'];

			$sql = "update lend_details SET ad_active ='0' where id=$id";

				if ($conn->query($sql) === TRUE)
				{
				   


     /********* send notification code *****************/

function send_notification()
{
global $id;
include('config.php');
$sql2 = "SELECT s.* from sessions s, lend_details l Where s.user_id=l.user_id and l.id='".$id."'"; 
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);

$token = $row2['device_token'];
$uid = $row2['user_id'];

define( 'API_ACCESS_KEY', 'AAAAhpZWSHM:APA91bGUOOfGGe96x5xLs_LNk63T60_0b0mwGxuSz41eyjBYh_YhfU7FnbE5rCEzILVoivooP9rc9itn9jZ9k5WXPZXVLFjKPvjzEr3lYKaCyrBijZTJIefJJUw5osGdVFq-11aAivcb');
 
#prep the bundle
     $msg = array
          (
		'body' 	=> 'Hello user, as per request your product is deactivated from Hoodycam !!!  ',
		'title'	=> 'Hoodycam',
		'sound' => 'default',
		'color' => '#23E78'
		
             	
          );
	$fields = array
			(
				'to'		=>$token,
				'notification'	=> $msg,
				
			);

	
	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		//echo $result;
		
		curl_close( $ch );
}
send_notification(); 
 
    /************* notification end  ********************/

				   echo '<script>

				   		  alert("Deactivated Successfully !");
				   		  //window.location = "user_accept.php";
				   		  window.location = "booked_item.php";
												
						</script>';

				} 
				else{
				 	echo 'error';
				 } 
	}

	if(isset($_POST["reject"])) {

      	$id = $_POST['reject'];

      		$sql = "update lend_details SET ad_verify ='0' where id=$id";

			if ($conn->query($sql) === TRUE)
			 {
			   
			   echo '<script>

			   		  alert("Rejected Successfully !");
			   		  window.location = "user_accept.php";
											
					</script>';
			} 
			else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
      	

      }

