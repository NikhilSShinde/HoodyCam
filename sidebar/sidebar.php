        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="home.php" class="site_title"><span>HOODYCAM</span></a></em>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="assets/images/defaults/logo.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <!-- <h3>General</h3> -->
                <ul class="nav side-menu">
                  <li><a href="home.php"><i class="fa fa-home"></i> Home </a>
                  
                  </li>

        
                <li><a><i class="fa fa-arrow-circle-right"></i> Lend <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <!-- <li><a href="lend_camera_registration.php">Lend Requests</a></li> -->
                     <!-- <li><a href="verified_lend_cameras.php">Verified Requests</a></li> -->
                      <li><a href="add_packages.php">Add Package </a></li>
                       <li><a href="view_packages.php"> View Package</a></li>
                      <li><a href="user_accept.php">User Acceptance</a></li>
                      <!--<li><a href="booked_item.php">Booked Item</a></li>-->
                     <li><a href="rejected_lend_request.php">Declined Requests</a></li>
                      
                    </ul>
                  </li>

                <li><a><i class="fa fa-arrow-circle-right"></i> Rent<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       
                       
                        
                      <li><a href="camera_request.php">Rent Requests</a></li>
                      <!--<li><a href="verified_users.php">Verified Requests</a></li>
                      <li><a href="rejected_rent_request.php">Rejected Requests</a></li>-->
                      <li><a href="order_user.php">Payment Success List</a></li>
                       <li><a href="camera_request.php">Rent Requests(Order Placed,Aborted Transaction)</a></li>
                      <li><a href="unplaced_order.php">Rent Requests(Order Not Placed)</a></li>
                      <!-- <li><a href="camera_used.php">Camera Used</a></li> -->
                    </ul>
                  </li>

                   <li><a><i class="fa fa-arrow-circle-right"></i>Product Status <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="camera_in_use.php">Product In Use</a></li>
                      <li><a href="camera_used.php">Product Used(Apply Charges)</a></li>
                      <li><a href="charge_applied.php">Product Used(Charges Applied)</a></li>
                     
                    </ul>
                  </li>
                      

                  

<!-- Code for photoshoot -->

<li><a><i class="fa fa-camera"></i> Photoshoot<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_photoshoot_package.php">Add Package</a></li>
                      <li><a href="view_photoshoot_package.php"> View Package</a></li>
                      <!-- <li><a href="photoshoot_booking.php">Booking Request</a></li> -->
                      <li><a href="booking_wt_pay.php">Booking with Payment</a></li>
                      <li><a href="allocated_request.php">Allocated Request</a></li>
                      <li><a href="booking_request.php">Booking Request(Booking Placed,Aborted Transaction)</a></li>
                      <li><a href="unplaced_booking_order.php">Unplaced Booking Request(Order Not Placed)</a></li>
                      <li><a href="cameraman_signup_list.php">Cameraman signup List</a></li>
                       <li><a href="photouser_feedback.php">User Feedback</a></li>
                     <!-- <li><a href="cameraman_status.php">Cameraman status</a></li> -->
                   </ul>
                  </li>
<!-- end of photoshoot -->




              <!--    <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.php">General Form</a></li>
                      <li><a href="form_advanced.php">Advanced Components</a></li>
                      <li><a href="form_validation.php">Form Validation</a></li>
                      <li><a href="form_wizards.php">Form Wizard</a></li>
                      <li><a href="form_upload.php">Form Upload</a></li>
                      <li><a href="form_buttons.php">Form Buttons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.php">General Elements</a></li>
                      <li><a href="media_gallery.php">Media Gallery</a></li>
                      <li><a href="typography.php">Typography</a></li>
                      <li><a href="icons.php">Icons</a></li>
                      <li><a href="glyphicons.php">Glyphicons</a></li>
                      <li><a href="widgets.php">Widgets</a></li>
                      <li><a href="invoice.php">Invoice</a></li>
                      <li><a href="inbox.php">Inbox</a></li>
                      <li><a href="calendar.php">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.php">Tables</a></li>
                      <li><a href="tables_dynamic.php">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.php">Chart JS</a></li>
                      <li><a href="chartjs2.php">Chart JS2</a></li>
                      <li><a href="morisjs.php">Moris JS</a></li>
                      <li><a href="echarts.php">ECharts</a></li>
                      <li><a href="other_charts.php">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.php">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.php">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>  
              </div>
             <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.php">E-commerce</a></li>
                      <li><a href="projects.php">Projects</a></li>
                      <li><a href="project_detail.php">Project Detail</a></li>
                      <li><a href="contacts.php">Contacts</a></li>
                      <li><a href="profile.php">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.php">403 Error</a></li>
                      <li><a href="page_404.php">404 Error</a></li>
                      <li><a href="page_500.php">500 Error</a></li>
                      <li><a href="plain_page.php">Plain Page</a></li>
                      <li><a href="login.php">Login Page</a></li>
                      <li><a href="pricing_tables.php">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.php">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>-->
              </div>  

            </div>
            <!-- /sidebar menu -->

             </div>
        </div>