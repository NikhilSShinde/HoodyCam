<?php
  session_start();
  $id =  $_SESSION['id'];
  
  if(!isset($id)){
    header('location:index.php');
   }

include('config.php');

 $id=$_GET['id'];
 
   $sql="SELECT l.*,t.*,e.name,v.package_no,v.model_name,

  DATE_FORMAT(l.start_date,'%d-%m-%Y') AS 'start_date',
  DATE_FORMAT(l.start_time,'%h:%i %p') AS 'start_time',
  DATE_FORMAT(l.end_date,'%d-%m-%Y') AS 'end_date',
  DATE_FORMAT(l.end_time,'%h:%i %p') AS 'end_time',
  DATE_FORMAT(t.start_trip,'%d-%m-%Y') AS 'start_trip_date',
  DATE_FORMAT(t.start_trip,'%h:%i %p') AS 'start_trip_time',
  DATE_FORMAT(t.end_trip,'%d-%m-%Y') AS 'end_trip_date',
  DATE_FORMAT(t.end_trip,'%h:%i %p') AS 'end_trip_time' FROM
  end_users e,lend_details l,rent_details r,rent_lend_categories rc,view_packages v,trips t WHERE 
  e.id=l.user_id AND l.id=r.lend_details_id AND v.p_id=r.package_id AND rc.id=r.cat_id AND 
  r.id=t.rent_details_id AND t.id='".$id."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $rid = $row['rent_details_id'];


                                        
 $date1 = $row['end_date']; 
 $date2 = $row['end_trip_date'];

 $time1 = $row['end_time'];
 $time2 = $row['end_trip_time'];


 
 $datetime1 = date_create($date1);
 $datetime2 = date_create($date2);

 $datetime3 = date_create($time1);
 $datetime4 = date_create($time2);



if( ($datetime1 < $datetime2) || ($datetime1 == $datetime2)){
   $interval = date_diff($datetime1, $datetime2);
   $diff = $interval->format('%a days');

   if($datetime3 < $datetime4){
   $interval = date_diff($datetime3, $datetime4);
   $timediff = $interval->format(' %H:%i hrs');
   }
   
    
 }else{

   $diff ="0 day";
   $timediff =" 00:00 hrs";
}



  $sql1="SELECT r.*,e.name FROM
  end_users e,rent_details r, trips t WHERE 
  e.id=r.user_id AND r.id=t.rent_details_id AND r.id='".$rid."'";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
  
  $sql3 = "SELECT * FROM view_packages WHERE p_id='".$row1['package_id']."'";
  $result3 = mysqli_query($conn, $sql3);
  $row3 = mysqli_fetch_assoc($result3);

  
  $query = "SELECT tr.Amount FROM trips t,orders o,transactions tr, rent_details r WHERE t.rent_details_id=o.rent_details_id AND o.id=tr.order_id AND r.id=o.rent_details_id AND tr.order_status='Success' AND r.id=".$rid."";

  $result2 = mysqli_query($conn, $query);
  $row2 = mysqli_fetch_assoc($result2);
  $amount = $row2['Amount'];
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product Used </title>

    <?php include('header/header.php'); ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       
            <?php include('sidebar/sidebar.php') ?>

        <!-- top navigation -->
         <?php include('topbar/top_navbar.php'); ?>
        <!-- /top navigation -->

      <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel" style="margin-top: 57px;">
                  <div class="x_content">

                  <span class="section">Lend User Information </span>
                  <div class="row">   
                    <form  class="form-horizontal form-label-left" novalidate>
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Name
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['name']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Mobile Number</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['mobile1']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                      </div>
                        
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">E-Mail</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                         <input type="text" value="<?php echo $row['email']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Address</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <textarea class="form-control" readonly="readonly"><?php echo $row['address']?></textarea>
                        </div>
                       </div>

                       <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Location</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                         <input type="text" value="<?php echo $row['location']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                       </div>

                         <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Model Name</label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['model_name']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>

                         <label class="control-label col-md-2 col-sm-2 col-xs-12">Model Number
                        </label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row['model_no']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                      </div>
                        
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Start Date / Time</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" value="<?php echo $row['start_date']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>

                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" value="<?php echo $row['start_time']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">End Date / Time</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" id="date1" value="<?php echo $row['end_date']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" id="time1" value="<?php echo $row['end_time']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                      </div>

                                       

                       <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Start Trip Date-Time</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" value="<?php echo $row['start_trip_date']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>

                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" value="<?php echo $row['start_trip_time']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">End Trip Date-Time</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" id="date2"  value="<?php echo $row['end_trip_date']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input type="text" id="time2" value="<?php echo $row['end_trip_time']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                      </div>

                       <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Before Damage Desc</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                           <textarea class="form-control" readonly="readonly"><?php echo $row['dam_desc']?></textarea>
                        </div>
                        
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">After Damage Desc</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                           <textarea class="form-control" readonly="readonly"><?php echo $row['damage_desc']?></textarea>
                        </div>
                      </div>
                        
                       
                       <span class="section">Rent User Information</span>

                       <div class="item form-group">
                       <label class="control-label col-md-2 col-sm-2 col-xs-12">Name
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row1['name']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Mobile Number</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $row1['mobile1']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                      </div>
                        
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">E-Mail</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                         <input type="text" value="<?php echo $row1['email']?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Address</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <textarea class="form-control" readonly="readonly"><?php echo $row1['address']?></textarea>
                        </div>
                       </div>

                       <div class="item form-group">
                       
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Deposite amount </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                         <input type="text" value="<?php echo $row3['deposite']; ?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Amount paid</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                         <input type="text" value="<?php echo $amount; ?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
                       </div>



                       </form>
                  </div>    

                
                  
                <div class="row">
                 
                   <form  action="extra_charge_query.php"  onSubmit="if(!confirm('Are you sure ?')){return false;}" method="POST" class="form-horizontal form-label-left" >
                  
                <?php if($row['end_trip_date']==null){?>    
                  
                     <div class="ln_solid"></div>
                     <div class="form-group">
                     <div class="col-md-6 col-md-offset-6 col-sm-offset-6 col-xs-offset-4 ">
                     <a href="camera_used.php" class="btn btn-warning">Back</a>
                     </div>
                     </div>
                <?php }else{?>      

              <span class="section">Applicable Charges</span>  


              <div class="item form-group">
                       <label class="control-label col-md-2 col-sm-2 col-xs-12">Extra Day & Time
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" value="<?php echo $diff;  ?><?php echo $timediff ?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                        </div>
              </div>

                  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Tax Amount
                        </label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="number" step="any" id="t1" name="ext_charge" class="form-control prc col-md-7 col-xs-12" min="0" required="required">
                        </div>
                        
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Extra Time Charge</label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="number" step="any" id="t2" name="ext_time_charge" class="form-control prc col-md-7 col-xs-12" min="0" required="required">
                        </div>
                  </div>  

                  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Damage Charge
                        </label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="number" step="any" id="t3" name="damage_charge" class="form-control prc col-md-7 col-xs-12" min="0" required="required">
                        </div>

                         <label class="control-label col-md-2 col-sm-2 col-xs-12">Total Charges
                        </label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="number" step="any" id="t4" name="total_charge" class="form-control  col-md-7 col-xs-12" readonly="readonly">
                        </div>
                        
                  </div>
                     
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        
                      <div class="col-md-6 col-md-offset-5 col-sm-offset-5 col-xs-offset-3 ">
                     
                       <button type="submit" name="submit" value="<?php echo $id; ?>" class="btn btn-primary">Save</button> 
                    
                       <button type="reset" name="" value="" class="btn btn-info">Reset</button>
                      
                      
                      <a href="camera_used.php" class="btn btn-warning">Back</a>
                     
                    
                        
                        </div>
                      </div>

                      <?php }?>
                      </form>
                    </div>
                   
               
                  </div>
                </div>
              </div>
            </div>
         </div>
          
        <!-- /page content -->

        
      </div>
    </div>
    <script>
                    
            $('.form-group').on('input','.prc', function(){
               
               var totalSum=0;
               $('.form-group .prc').each(function(){

                   var inputVal=$(this).val();
                   if($.isNumeric(inputVal)){
                      totalSum += parseFloat(inputVal);
                   }
               });
                    $('#t4').val(totalSum);
            });

                     </script>
    
   <?php include('footer/footer.php'); ?>

  </body>
</html>