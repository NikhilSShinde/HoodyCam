<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Camera Request</title>

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
          <div class="">


            <div class="row">
              <!-- <div class="col-md-12 "> -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="margin-top: 57px;">
            <!--     <form class="form-horizontal form-label-left" novalidate>    -->
                  <div class="x_content">
                    <div class="row">

                      
                      <div class="item-form-group" style="margin-left: 0 px;">
                              
                            <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Categories</label>
                                          
                                <div class="col-md-3 col-sm-3 col-xs-12 form-group">
                                              <select class="form-control">
                                                <option value="">-- Select --</option>
                                                <option value="">Camera (DSLR's)</option>
                                                <option value="">Go-Pro's</option>
                                                <option value="">Lenses</option>
                                              </select>
                                </div>
                          </div>


                        <table id="datatable-fixed-header1" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sub-Category</th>
                          <th>package</th>
                         
                          
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <tr>
                          <td>Hermione Butler</td>
                          <td>Regional Director</td>
                         
                          <td>
                          <button class="btn btn-success btn-xs" value="">Update</button></td>
                        </tr>
                        <tr>
                          <td>Lael Greer</td>
                          <td>Systems Administrator</td>
                          
                          <td>
                              <button class="btn btn-success btn-xs">Update</button>
                              
                            </td>
                        </tr>
                       
                        
                        <tr>
                          <td>Donna Snider</td>
                          <td>Customer Support</td>
                         
                          <td>
                              <button class="btn btn-success btn-xs">Update</button>
                              
                            </td>
                        </tr>
                      </tbody>
                    </table>



                    </div>
                  </div>
              <!--    </form>   -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        
      </div>
    </div>
    
   <?php include('footer/footer.php'); ?>


<script type="text/javascript">
  $('#datatable-fixed-header1').DataTable( {
    "bInfo" : false,
    "paging": false,
    "searching": false,
    "ordering" : false
} );
</script>


  </body>
</html>