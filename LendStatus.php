<?php 
require_once "config.php";


	  if(isset($_POST["verify"])){
    
       
      	$id = $_POST['verify'];

			$sql = "update lend_details SET ad_verify ='1' where id=$id";

				if ($conn->query($sql) === TRUE)
				{
				  
					
function send_notification()
{
global $id;
include('config.php');
$sql1 = "SELECT s.* from sessions s, lend_details l Where s.user_id=l.user_id and l.id='".$id."'"; 
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
					
				
				   echo '<script>

				   		  alert("Verified Successfully !");
				   		  window.location = "lend_camera_registration.php";
												
						</script>';

				} 
	}


	if(isset($_POST["reject"])) {

      	$id = $_POST['reject'];

      		$sql = "update lend_details SET ad_verify ='0' where id=$id";

			if ($conn->query($sql) === TRUE)
			 {
			   
			   
function send_notification()
{
global $id;
include('config.php');
$sql1 = "SELECT s.* from sessions s, lend_details l Where s.user_id=l.user_id and l.id='".$id."'"; 
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
			   		  window.location = "lend_camera_registration.php";
											
					</script>';
			} 
			else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
      	

      }



 if(isset($_POST["update"])) {

      	$id = $_POST['update'];
        $model_name = $_POST['model_name'];

        // Select previous image
	    $sel_sel = "SELECT * FROM lend_details WHERE id = '".$id."'";
	    $ex = mysqli_query($conn, $sel_sel);
	    $rows =  mysqli_fetch_assoc($ex);
	    $imgdata = $rows['pic'];
	    $ModelName = $rows['model_name'];

 
 		if(isset($_FILES['image']) && !empty($_FILES['image'])){
  	
  		$file = $_FILES['image'];

     	$file_name = $file['name'];
        $file_type = $file['type'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $kaboom = explode(".", $file_name);
		$fileExt = end($kaboom);

        if( ($file['tmp_name']==NULL) && ($ModelName==$model_name) ) {
        	
         
          echo "<script>
		  alert('Nothing to Update !');
		  //window.location = 'view_lend_registration_request.php?id=$id';
   		  window.location = 'update_user_accept.php?id=$id';
		  </script>";
								
        }
        elseif( ($file['tmp_name']==NULL) && ($ModelName != $model_name) ){


        $sql = "UPDATE lend_details SET model_name = '$model_name' WHERE id = $id";

			if ($conn->query($sql) === TRUE)
			 {
			   
			   echo "<script>

			   		  alert('Model Name Updated Successfully !');
			   		 // window.location = 'view_lend_registration_request.php?id=$id';
			   		 window.location = 'update_user_accept.php?id=$id';
				     				
					</script>";
			} 
			else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

        }
        elseif( ($file['tmp_name']!=NULL) && ($ModelName == $model_name) )
  		{
  			
  			$file_tmp = $file['tmp_name'];
  			
  			$moveResult = move_uploaded_file($file_tmp, "assets/images/uploads/$file_name");
  			if ($moveResult != true) {
			    echo "ERROR: File not uploaded. Try again.";
			    unlink($file_tmp); // Remove the uploaded file from the PHP temp folder
			   
			}
  			$target_file = "assets/images/uploads/$file_name";
  			$resized_file = "assets/images/uploads/resized_$file_name";
  			$resized_file1 = "assets/images/uploads/resized_$file_name";


  			$wmax = 640;
			$hmax = 480;
			
			
			img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);

			unlink($target_file);

  			$data = file_get_contents($resized_file1);
		    $dataUri = 'data:'.$file_type . ';base64,' . base64_encode($data);
	    	
		    $sql = "UPDATE lend_details SET pic = '$dataUri' WHERE id = $id";

			if ($conn->query($sql) === TRUE)
			 {
			   unlink($resized_file1);
			   echo "<script>

			   		  alert('Model Image Updated Successfully !');
			   		 // window.location = 'view_lend_registration_request.php?id=$id';
			   		 window.location = 'update_user_accept.php?id=$id';
						 					
					</script>";
			} 
			else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

  		}
  		else{

  			$file_tmp = $file['tmp_name'];
  			
  			$moveResult = move_uploaded_file($file_tmp, "assets/images/uploads/$file_name");
  			if ($moveResult != true) {
			    echo "ERROR: File not uploaded. Try again.";
			    unlink($file_tmp); // Remove the uploaded file from the PHP temp folder
			   
			}
  			$target_file = "assets/images/uploads/$file_name";
  			$resized_file = "assets/images/uploads/resized_$file_name";
  			$resized_file1 = "assets/images/uploads/resized_$file_name";


  			$wmax = 640;
			$hmax = 480;
			
			
			img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);

			unlink($target_file);

  			//$data = file_get_contents($file_tmp);
		    
			$data = file_get_contents($resized_file1);
		    $dataUri = 'data:'.$file_type . ';base64,' . base64_encode($data);

  			$sql = "UPDATE lend_details SET model_name ='$model_name', pic = '$dataUri' WHERE id = $id";

			if ($conn->query($sql) === TRUE)
			 {
			   unlink($resized_file1);
			   echo "<script>

			   		  alert('Model Name and Image Updated Successfully !');
			   		 // window.location = 'view_lend_registration_request.php?id=$id';
			   		 window.location = 'update_user_accept.php?id=$id';
										
					</script>";
			} 
			else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

  		}
  			

  		}

     
  }


// Function for resizing jpg, gif, or png image files
function img_resize($target, $newcopy, $w, $h, $ext) {
    list($w_orig, $h_orig) = getimagesize($target);
    $scale_ratio = $w_orig / $h_orig;
    if (($w / $h) > $scale_ratio) {
           $w = $h * $scale_ratio;
    } else {
           $h = $w / $scale_ratio;
    }
    $img = "";
    $ext = strtolower($ext);
    if ($ext == "gif"){ 
      $img = imagecreatefromgif($target);
    } else if($ext =="png"){ 
      $img = imagecreatefrompng($target);
    } else { 
      $img = imagecreatefromjpeg($target);
    }
    $tci = imagecreatetruecolor($w, $h);
   
    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
    imagejpeg($tci, $newcopy, 80);
}




     
?>