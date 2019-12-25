<?php 

	require_once('config.php');
	$categoryId = $_GET['categoryId']; 

		$sql2 = "SELECT * FROM photo_sub_cat WHERE cat_id ='".$categoryId."'ORDER BY id"; 													
		$result8 = mysqli_query($conn, $sql2);
		$return2=mysqli_num_rows($result8);
		if($return2 > 0)
		{
			?>
			<option value="">SELECT</option>
			<?php 
				while($row = mysqli_fetch_array($result8))
				{
			?>
				<option value="<?php echo htmlspecialchars_decode($row['id'],ENT_QUOTES); ?>"><?php echo htmlspecialchars_decode($row['cat_name'],ENT_QUOTES); ?></option>																									
			<?php	
				}
					
		}
		else
		{
			?>
				<option value="">Not available</option>																									
			<?php	
					
		}
	?>
	