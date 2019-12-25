<?php 

	require_once('config.php');
	$categoryId = $_GET['categoryId']; 
	$modelName=$_GET['modelName'];

		$sql2="SELECT package_no from rent_package_no where package_no not in(select package_no from view_packages where cat_id='".$categoryId."' and model_name='".$modelName."')";
															
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
				<option value="<?php echo htmlspecialchars_decode($row['package_no'],ENT_QUOTES); ?>"><?php echo htmlspecialchars_decode($row['package_no'],ENT_QUOTES); ?></option>																									
			<?php	
				}
					
		}
		else
		{
			?>
				<option value="">Package Already Created</option>																									
			<?php	
					
		}
	?>
	