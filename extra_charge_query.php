<?php
require_once('config.php');


if(isset($_POST["submit"]))
{ 

$id = $_POST['submit'];
$ext_charge=$_POST['ext_charge'];
$ext_time_charge=$_POST['ext_time_charge'];
$damage_charge = $_POST['damage_charge'];
$total_charge = $_POST['total_charge'];


$query="SELECT * from trips WHERE id=".$id."";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$rent_details_id = $row['rent_details_id'];

$query1 = "SELECT tr.Amount, r.mobile1 FROM trips t,orders o,transactions tr, rent_details r WHERE t.rent_details_id=o.rent_details_id AND o.id=tr.order_id AND r.id=o.rent_details_id AND tr.order_status='Success' AND r.id=".$rent_details_id."";

$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_assoc($result1);
$amount = $row1['Amount'];
$number = $row1['mobile1'];



$total_amount = $amount + $total_charge;

 $sql = "UPDATE trips SET extra_charge='$ext_charge',extra_time_charge='$ext_time_charge',damage_charge='$damage_charge',total_amount='$total_amount' where id=".$id."";



if ($conn->query($sql) === TRUE)
 {
 
 

	// Authorisation details.
	$username = "hoodycampune@gmail.com";
	$hash = "eaecfa79162e30f83877d85dada9df135552b903047de6d22321135113ea4312";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "HDYCAM"; // This is who the message appears to be from.
	$numbers = $number; // A single number or a comma-seperated list of numbers
	$message = 'Hello,
Please check your Bill and Refundable amount in "My Order" option in HoodyCam App. 
Please give us feedback to serve you more better.
Team,
HoodyCam';
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
 

function send_notification()
{
global $id;
include('config.php');
$sql2 = "SELECT s.* from sessions s, rent_details r Where s.user_id=r.user_id and r.id='".$id."'"; 
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);

$token = $row2['device_token'];
$uid = $row2['user_id'];

define( 'API_ACCESS_KEY', 'AAAAhpZWSHM:APA91bGUOOfGGe96x5xLs_LNk63T60_0b0mwGxuSz41eyjBYh_YhfU7FnbE5rCEzILVoivooP9rc9itn9jZ9k5WXPZXVLFjKPvjzEr3lYKaCyrBijZTJIefJJUw5osGdVFq-11aAivcb');
 //   $registrationIds = ;
#prep the bundle
     $msg = array
          (
		'body' 	=> 'Please drop your Valuable feedback ! ',
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
 
 
 
   
   echo "<script>

   		  
   		  alert('Added Successfully !');
   		  //window.location = 'view_camera_used.php?id=$id';
   		   window.location = 'camera_used.php';
								
		</script>";
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


?>




