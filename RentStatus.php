<?php 
include("config.php");


    if(isset($_POST["verify"]))
    {
      	$id = $_POST['verify'];

			$sql = "update rent_details SET ad_verify ='1' where id=$id";

				if ($conn->query($sql) === TRUE)
				{
				   
				  
				  function send_notification()
{
global $id;
include('config.php');
$sql1 = "SELECT s.* from sessions s, rent_details r Where s.user_id=r.user_id and r.id='".$id."'"; 
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);

$token = $row1['device_token'];
$uid = $row1['user_id'];

define( 'API_ACCESS_KEY', 'AAAAhpZWSHM:APA91bGUOOfGGe96x5xLs_LNk63T60_0b0mwGxuSz41eyjBYh_YhfU7FnbE5rCEzILVoivooP9rc9itn9jZ9k5WXPZXVLFjKPvjzEr3lYKaCyrBijZTJIefJJUw5osGdVFq-11aAivcb');
 //   $registrationIds = ;
#prep the bundle
     $msg = array
          (
		'body' 	=> 'Your request has been Verified Successfully',
		'title'	=> 'Hoodycam',
		'sound' => 'default',
		'color' => '#23E78'
             	
          );
	$fields = array
			(
				'to'		=>$token,
				'notification'	=> $msg
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
		
		
		curl_close( $ch );
}



		send_notification();
				  
				  
				   echo '<script>

				   		  alert("Verified Successfully !");
				   		  window.location = "camera_request.php";
												
						</script>';

				} 
	}

if(isset($_POST["reject"])) {

      	$id = $_POST['reject'];

      		$sql = "update rent_details SET ad_verify = '0' where id=$id";

			if ($conn->query($sql) === TRUE)
			 {
			   
			  
			  function send_notification()
{
global $id;
include('config.php');
$sql1 = "SELECT s.* from sessions s, rent_details r Where s.user_id=r.user_id and r.id='".$id."'"; 
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);

$token = $row1['device_token'];
$uid = $row1['user_id'];

define( 'API_ACCESS_KEY', 'AAAAhpZWSHM:APA91bGUOOfGGe96x5xLs_LNk63T60_0b0mwGxuSz41eyjBYh_YhfU7FnbE5rCEzILVoivooP9rc9itn9jZ9k5WXPZXVLFjKPvjzEr3lYKaCyrBijZTJIefJJUw5osGdVFq-11aAivcb');
 //   $registrationIds = ;
#prep the bundle
     $msg = array
          (
		'body' 	=> 'Your request has been rejected !',
		'title'	=> 'Hoodycam',
		'sound' => 'default',
		'color' => '#23E78'
             	
          );
	$fields = array
			(
				'to'		=>$token,
				'notification'	=> $msg
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
		
		
		curl_close( $ch );
}



		send_notification();
			  
			  
			  
			   echo '<script>

			   		  alert("Rejected Successfully !");
			   		  window.location = "camera_request.php";
											
					</script>';
			} 
			else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
      	

      }
     
?>