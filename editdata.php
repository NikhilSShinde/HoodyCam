<?php
    require('conn.php');
    $id = $_GET['id'];

    if (isset($_POST['submit'])) {
    


 $id=$_POST['submit'];
$category_id=$_POST['category_name'];	
$package_no=$_POST['package_no'];
$start=$_POST['start'];
$end=$_POST['end'];
$rate_per_day=$_POST['rate'];



    $mysqli->query("UPDATE `view_packages` SET `package_no` = '$package_no', `start_day` = '$start', `end_day`='$end', `rate_per_day`='$rate_per_day' WHERE `sr_no`=$id");
    	header("location:home.php");
    }

    $members = $mysqli->query("SELECT * FROM `view_packages` WHERE `sr_no`='$id'");
    $mem = mysqli_fetch_assoc($members);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using Bootstrap modal</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form method="post" action="editdata.php" role="form">
	<div class="modal-body">
		 <div class="form-group">
			<label for="id">ID</label>
			<input type="text" class="form-control" id="id" name="id" value="<?php echo $mem['sr_no'];?>" readonly="true"/>

		</div> 
		<div class="form-group">
			<label for="name">Package No</label>
			<input type="text" class="form-control" id="name" name="name" value="<?php echo $mem['package_no'];?>" />
		</div>
		<div class="form-group">
			<label for="phone">start</label>
				<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $mem['start_day'];?>" />
		</div>
		<div class="form-group">
			<label for="address">End</label>
			<input type="text" class="form-control" id="address" name="address" value="<?php echo $mem['end_day'];?>" />

		</div>
		<div class="form-group">
      <label for="email">Rate</label>
			<input type="text" class="form-control" id="email" name="email" value="<?php echo $mem['rate_per_day'];?>" />
		</div>
		</div>
		<div class="modal-footer">
			<input type="submit" class="btn btn-primary" name="submit" value="Update" />&nbsp;
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</form>
</body>
</html>
