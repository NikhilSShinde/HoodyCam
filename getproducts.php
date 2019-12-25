<?php include('header/header.php'); ?>

<?php
include('header/header.php');

	include('configPDO.php');

	$action = $_REQUEST['action'];
	
	if($action==""){
		
		// $stmt=$dbcon->prepare('SELECT * FROM view_packages ORDER BY sr_no');
		// $stmt->execute();
		

		
		
	}else{
		
		$stmt=$dbcon->prepare('SELECT * FROM view_packages v,rent_lend_category r where v.rent_lend_cat_id=r.rent_lend_cat_id and r.rent_lend_cat_id=:cid ORDER BY sr_no');
			
	 	$stmt->execute(array(':cid'=>$action));

	}
	
	?>
	<div class="row">
	
			<div class="col-md-12 col-sm-12 col-xs-12">
			

				<table id="datatable-fixed-header1" class="table table-striped table-bordered" >
                      <thead>
                        <tr>
                          
                          <th>Package No</th>
                          <th>No of days (Range)</th>
                          <th>Rate per Day</th>
                          <th>Action</th>
                         
                        </tr>
                      </thead>
				<tbody>
		<?php
	
			if($stmt->rowCount() > 0){
								
						while($row=$stmt->fetch(PDO::FETCH_ASSOC))
						{
							extract($row);
							
		?>
						<tr>
                          <td><?php  echo $package_no;   ?></td>
                          <td><?php  echo $start_day; ?>-<?php echo $start_day;  ?></td>
                          <td><?php  echo $rate_per_day;   ?></td>

                          <td><button class="btn btn-warning btn-xs" value="" data-toggle="modal" data-target="#myModal<?php echo $sr_no;?>" >Update</button>
                          <button class="btn btn-success btn-xs" value="">Verify</button>
                          <button class="btn btn-danger btn-xs" value="">Reject</button></td>
                           </tr>


<!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $sr_no;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
       
        <!-- Modal header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Package Information</h4>
        </div>
        <!-- /Modal header -->
                <!-- Modal Body -->
        <div class="modal-body">
          <form id="demo-form2"  class="form-horizontal form-label-left" 
          action="update_package_query.php" method="POST">

                      <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="category_name">Category Name <span class="required"></span></label>
                      
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                         
                            <select class="form-control" name="category_name">
                                <option value="<?php $rent_lend_cat_id ?>">
                                     <?php echo $rent_lend_cat_name;?>
                                </option>
                                       
                                  <?php
                                    include('config.php');
                                  $sql1="SELECT  * FROM `rent_lend_category`"; 
                                  
                                  $result1 = mysqli_query($conn, $sql1);
                                  $return1=mysqli_num_rows($result1);
                                        
                                        if($return1 > 0)
                                        {
                                          while($row1 = mysqli_fetch_array($result1))
                                          { ?>
                                            <option value="<?php echo ($row1['rent_lend_cat_id']); ?>"><?php echo ($row1['rent_lend_cat_name']); ?>
                                            	
                                            </option>                                                  
                                    <?php }
                                              
                                        }
                                  ?>
                                </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="package no">Package No <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" name="package_no" value="<?php echo $package_no;?>" required="required" class="form-control col-md-7 col-xs-12 form-group">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12 form-group">No of Days(Range)</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                          <input  type="text" name="start" value="<?php echo $start_day;?>" class="form-control col-md-4 col-xs-12 form-group">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                         <input  type="text" name="end" value="<?php echo $end_day;?>" class="form-control col-md-4 col-xs-12 form-group">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12 form-group" for="last-name">Rate per Day <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                          <input type="text"  name="rate" value="<?php echo $rate_per_day;?>" class="form-control col-md-7 col-xs-12 form-group">
                        </div>
                      </div>
                      
                      
                      
                        <div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-5">
                          <button type="submit" name="submit" value="<?php echo "$sr_no"; ?>" class="btn btn-success">Submit</button>
                          <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                         
                        </div>
                      </div>

                    </form>
        </div> <!--    Modal Body -->


        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>  <!-- Modal content -->
      
    </div>
  </div>

  <!-- modal end -->      		



 <?php } ?>		
						
                    </tbody>
                </table>      
				

			<br/>
		</div>

<?php	}else{ ?>    
								
								
                    

			
        <div class="col-md-12 col-sm-12 col-xs-3">
			     <table>
			     	<tbody>
			      <tr>
			      	<td></td><td></td><td></td><td></td>
			      	<div class="col-md-12 col-sm-6 col-xs-3" align="center"><?php echo "No Matching Record Found for Searched Category" ?> </div>
			      </tr>

                     
                    </tbody>

                </table>      

		</div>
        <?php		
	}
	
	
	?>

	</div>


	 <!--jQuery-->
   <!--end-->
    <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

     <!-- bootstrap-daterangepicker -->
    <script src="assets/vendors/moment/min/moment.min.js"></script>
    <script src="assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="assets/build/js/custom.min.js"></script>

    <script src="assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- iCheck -->
    <script src="assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/vendors/pdfmake/build/vfs_fonts.js"></script>

 	
<script type="text/javascript">

  $('#datatable-fixed-header1').DataTable( {
    "bInfo" : false,
    "paging": false,
    "searching": false
} );

</script>

