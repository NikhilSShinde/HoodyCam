<?php
include('config.php');

if(isset($_POST["cid"]))
{ 

$eid = $_POST['eid']; 
$cid = $_POST['cid'];
$date= date("Y-m-d",strtotime($_POST['date']));

$query="SELECT sc.cat_name,e.name, DATE_FORMAT(u.start_date,'%d-%m-%Y') AS 'start_date',u.mobile1 from photo_user_details u, photo_sub_cat sc, end_users e WHERE e.id=u.user_id AND u.sub_cat_id=sc.id AND u.id=".$eid."";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$phootoshootUser = $row['name'];

$category = $row['cat_name'];
$subCategory = $category;

$startDate = $row['start_date'];

$number = $row['mobile1'];
$photouserMobno = $number;



$query1 = "SELECT * FROM cameraman_signups WHERE id='".$cid."'";
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_assoc($result1);

$nameCameraman = $row1['name'];
$cameramanName = $nameCameraman;
$cameramanMobile = $row1['mobile1'];



$sql = "insert into allocates(photo_user_id,date,signup_id) values('$eid','$date','$cid')";

if ($conn->query($sql) === TRUE)
 {
   
   
   
 	$sql1="UPDATE photo_user_details SET status=0 where id='".$eid."'";
		if ($conn->query($sql1) === TRUE)
		 {

    /********** send message code to photoshoot user start   *************/
    
    // Authorisation details.
	$username = "hoodycampune@gmail.com";
	$hash = "eaecfa79162e30f83877d85dada9df135552b903047de6d22321135113ea4312";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "HDYCAM"; // This is who the message appears to be from.
	$numbers = $number; // A single number or a comma-seperated list of numbers
	$message = "Hello User,
Your order for $category is confirmed for the $startDate. Ref. $nameCameraman, $cameramanMobile. Please contact to cameraman.
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
	
	//echo $result;
	//echo $data;

    	
    /*********************** send message code end   *************************/


    /********** send message code to cameraman start   *************/
    
    // Authorisation details.
	$username = "hoodycampune@gmail.com";
	$hash = "eaecfa79162e30f83877d85dada9df135552b903047de6d22321135113ea4312";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "HDYCAM"; // This is who the message appears to be from.
	$numbers = $cameramanMobile; // A single number or a comma-seperated list of numbers
	$message ="Hello $cameramanName,

You have received order of $subCategory by $phootoshootUser for $startDate. For ref. $photouserMobno
Thank You.

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
	//echo $result;
	//echo $data;
		

    	
    /*********************** send message code end   *************************/


    /********* send notification code *****************/

function send_notification()
{
global $eid;
include('config.php');
$sql2 = "SELECT s.* from sessions s, photo_user_details u Where s.user_id=u.user_id and u.id='".$eid."'"; 
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);

$token = $row2['device_token'];
$uid = $row2['user_id'];

define( 'API_ACCESS_KEY', 'AAAAhpZWSHM:APA91bGUOOfGGe96x5xLs_LNk63T60_0b0mwGxuSz41eyjBYh_YhfU7FnbE5rCEzILVoivooP9rc9itn9jZ9k5WXPZXVLFjKPvjzEr3lYKaCyrBijZTJIefJJUw5osGdVFq-11aAivcb');
 
#prep the bundle
     $msg = array
          (
		'body' 	=> 'Cameraman Allocated for your Request, Check Photoshoot order! ',
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
		echo $result;
		echo $data;
		
		curl_close( $ch );
}
send_notification(); 
 
    /************* notification end  ********************/

		   
		   echo '<script>

		   			alert("Allocated Successfully !");
		   		  //window.location = "view_packages.php";
		   		    window.location = "booking_wt_pay.php";
										
				</script>';
		} 
		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}  
   

} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



 }

?>