<?php 

	require_once('config.php');
	
	   $categoryId = $_GET['req_id']; 
	   $req_date = date("Y-m-d",strtotime($_GET['date'])); 
       
       
	    $sql2="SELECT DISTINCT cs.* FROM cameraman_signups cs left join allocates a on cs.id = a.signup_id where a.date is null or a.signup_id not in (select a.signup_id from allocates a where a.date='".$req_date."')";

		$result8 = mysqli_query($conn, $sql2);
		$return2=mysqli_num_rows($result8); ?>

		
		 <div class="table-responsive" style="overflow:scroll;height:200px;">
			<table id="datatable-fixed-header" class="table table-striped table-bordered">
            <thead >
              <tr>
                <th>Sr.No</th>
                <th>Name</th>
                <th>Mobile</th>
                <th style="width:30%;">Speciality</th>
                <th>Allocate</th>
              </tr>
            </thead>
            
            <tbody >	

            
	<?php	if($return2 > 0)
			{
			 $count = 0;
			
				while($row = mysqli_fetch_array($result8))
				{
						$count++;
						$cid = $row['id'];

						$sql1 = "SELECT * FROM cameraman_signups WHERE  id='".$cid."'";
						  $result1 = mysqli_query($conn, $sql1);
						  $row1 = mysqli_fetch_assoc($result1);
				
			?>
			
				<tr>
				  <td><?php echo $count ?></td>
				  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['mobile1']; ?></td>
                  <td> <span>
                  	     
                  	  		<!-- <?php 

                  	  		for ($i=1;$i<=18;$i++)
                            {
                              $check='sub_cat'.$i;
                               if($row1[$check]!= NULL){  ?>
                                 
                               <?php   $sub_cat = $row1[$check];        
                                       echo $sub_cat.','; ?>
                            
                         <?php     }  }  ?> -->

                         <?php $query = "SELECT sub_cat1 FROM signup_sub_cats WHERE id = $cid";
 
                                $result = mysqli_query($conn,$query);
                                 
                               
                                while($values = mysqli_fetch_array($result))
                                {
                                   $values= unserialize($values['sub_cat1']);

                                   if($values != ""){
                                   foreach($values as $value)
                                   {
                                       //print_r($value.",");
                                    print_r("<span style='font-size:10px;'>".$value."</span>,");
									}
                               	}
                                    
                               else{}
                                }
                             ?>
                        </span> </td>
                  
               
                  <td>
                  	<button type="submit" name="cid" class="btn btn-success btn-xs" value="<?php echo $cid;?>">Allocate</button>
                  	<input type="hidden" name="eid" value="<?php echo $categoryId; ?>">
                  	<input type="hidden" name="date" value="<?php echo $req_date; ?>">	
                  </td>

               
              	</tr>																								             
			<?php	
				} 
		 	}
		
		else
		{
			?>
				
				<tr><?php echo "<center><strong style='color:red;'>No cameraman available at the moment !!! </strong></center>" ?></tr>																										
			<?php	
					
		}
	?>
  			
	  </tbody>

          </table>
	</div>

