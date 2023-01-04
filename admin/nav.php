  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
		
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="background-color:#334e6c !important;color:#fff !important;">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <span class="app-brand-logo demo text-center">
				<center><img src="assets/logo/<?php echo $sval[7];?>" width="150px"></center>
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>
          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item <?php echo $index;?>" >
              <a href="index.php" class="menu-link"  style="color:white !important;">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">DASHBOARD</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item <?php echo $order;?>">
              <a href="javascript:void(0);" class="menu-link menu-toggle"  style="color:white !important;">
                <i class="menu-icon tf-icons bx bx-cart"></i>
                <div data-i18n="Layouts">ORDERS</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="order.php?data=pending" class="menu-link" style="color:white !important;">
                    <div data-i18n="Without menu">PENDING</div>
                  </a>
                </li> 
				
                <li class="menu-item">
                  <a href="order.php?data=approved" class="menu-link"  style="color:white !important;">
                    <div data-i18n="Without navbar">APPROVED</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="order.php?data=cancelled" class="menu-link"  style="color:white !important;">
                    <div data-i18n="Container">CANCELLED</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="order.php?data=completed" class="menu-link"  style="color:white !important;">
                    <div data-i18n="Fluid">COMPLETED</div>
                  </a>
                </li>
              
              </ul>
            </li>
			
			<li class="menu-item <?php echo $customer;?>">
              <a href="customer.php" class="menu-link"  style="color:white !important;">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">CUSTOMER</div>
              </a>
            </li>
				<li class="menu-item <?php echo $supplier;?>">
              <a href="supplier.php" class="menu-link"  style="color:white !important;">
                <i class="menu-icon tf-icons bx bx-user-check"></i>
                <div data-i18n="Analytics">SUPPLIER</div>
              </a>
            </li>
			<li class="menu-item <?php echo $users;?>">
              <a href="system-users.php" class="menu-link"  style="color:white !important;">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Analytics">SYSTEM USER</div>
              </a>
            </li>
			
			<li class="menu-item <?php echo $products;?>">
              <a href="products.php" class="menu-link" style="color:white !important;">
                <i class="menu-icon tf-icons bx bx-purchase-tag"></i>
                <div data-i18n="Analytics">PRODUCTS</div>
              </a>
            </li>
			
			<li class="menu-item <?php echo $reports;?>">
              <a href="javascript:void(0);" class="menu-link menu-toggle"  style="color:white !important;">
                <i class="menu-icon tf-icons bx bx-chart"></i>
                <div data-i18n="Misc">SALES</div>
              </a>
              <ul class="menu-sub">
              
                <li class="menu-item">
                  <a href="sales.php" class="menu-link"  style="color:white !important;">
                    <div data-i18n="Under Maintenance">SALES</div>
                  </a>
                </li>
				<li class="menu-item">
                  <a href="reports.php?data=daily" class="menu-link"  style="color:white !important;">
                    <div data-i18n="Under Maintenance">REPORTS</div>
                  </a>
                </li>
              </ul>
            </li>
         
           
			<li class="menu-item <?php echo $settings;?>">
              <a href="javascript:void(0);" class="menu-link menu-toggle"  style="color:white !important;">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Misc">SETTINGS</div>
              </a>
              <ul class="menu-sub">
              
                <li class="menu-item">
                  <a href="category.php" class="menu-link"  style="color:white !important;">
                    <div data-i18n="Under Maintenance">CATEGORY</div>
                  </a>
                </li>
				<li class="menu-item">
                  <a href="voucher.php" class="menu-link"  style="color:white !important;">
                    <div data-i18n="Under Maintenance">DISCOUNT VOUCHER</div>
                  </a>
                </li>
				<li class="menu-item">
                  <a href="settings.php" class="menu-link"  style="color:white !important;">
                    <div data-i18n="Under Maintenance">SYSTEM</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="logout.php" class="menu-link"  style="color:white !important;">
                <i class="menu-icon tf-icons bx bx-log-out-circle"></i>
                <div data-i18n="Analytics">LOGOUT</div>
              </a>
            </li>
            
          </ul>
        </aside>
        <!-- / Menu -->
		
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
				<b>
				<?php if($page == "index.php"){?>
                 DASHBOARD
				<?php } else if($page == "order.php"){?>
                 <?php echo strtoupper($_GET['data']);?> ORDERS
				<?php } else if($page == "timetable.php"){?>
					ORDERS TIME TABLE
				<?php }  else if($page == "customer.php"){?>
					CUSTOMER INFORMATION
				<?php } else if($page == "customer-record.php"){?>
					CUSTOMER DETAILS RECORDS
				<?php }  else if($page == "system-users.php"){?>
					SYSTEM USERS
				<?php }   else if($page == "products.php"){?>
					PRODUCTS LIST
				<?php }  else if($page == "category.php"){?>
					CATEGORY
				<?php }   else if($page == "settings.php"){?>
					SYSTEM SETTINGS
				<?php }   else if($page == "profile.php"){?>
					PROFILE 
				<?php } else if($page == "reports.php" || $page == 'sales.php'){?>
					<?php echo strtoupper($_GET['data']);?> SALES REPORTS 
				<?php } else if($page == "order-details.php"){?>
					TRANSACTION CODE : <?php echo strtoupper($_GET['data-transcode']);?> |  ORDER DETAILS 
				<?php }  else if($page == "voucher.php"){?>
					DISCOUNT VOUCHER
				<?php } ?>
				</b>
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
               

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
							<?php if($aval[6] == ""){?>
                              <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
							<?php } else { ?>
							  <img src="assets/img/avatars/<?php echo $aval[6];?>" alt class="w-px-40 h-auto rounded-circle" />
							<?php } ?>
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
							<?php if($aval[6] == ""){?>
                              <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
							<?php } else { ?>
							  <img src="assets/img/avatars/<?php echo $aval[6];?>" alt class="w-px-40 h-auto rounded-circle" />
							<?php } ?>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $aval[1] . ' ' .$aval[2];?></span>
                            <small class="text-muted">Admininstrator</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="profile.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                  
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>
