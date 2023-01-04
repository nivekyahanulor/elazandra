  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/dashboard.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
					<div class="col-lg-12 col-md-12 order-1">
					 <ul class="nav nav-pills mb-3" role="tablist">
						<?php  if($_GET['data']=='daily'){
							    $daily = "active";
						      } if($_GET['data']=='weekly'){
							   $weekly = "active";
						      } if($_GET['data']=='monthly'){
							   $monthly = "active";
							  }  if($_GET['data']=='yearly'){
							   $yearly = "active";
							  } ?>
                      <li class="nav-item">
                        <a
						  href="reports.php?data=daily" 
                          type="button"
                          class="nav-link <?php echo $daily;?>"
                        >
                          DAILY
                        </a>
                      </li>
                      <li class="nav-item">
                        <a
						  href="reports.php?data=weekly" 
                          type="button"
                          class="nav-link  <?php echo $weekly;?>"
                        >
                        WEEKLY
                        </a>
                      </li>  
					  <li class="nav-item">
                        <a
						  href="reports.php?data=monthly" 
                          type="button"
                          class="nav-link  <?php echo $monthly;?>"
                        >
                       MONTHLY
                        </a>
                      </li> 
					  <li class="nav-item">
                        <a
						  href="reports.php?data=yearly" 
                          type="button"
                          class="nav-link  <?php echo $yearly;?>"
                        >
                       YEARLY
                        </a>
                      </li>
                     
                    </ul>
					<div class="card">
						<br>
						<?php if($_GET['data']=='daily'){?>
						 <div id="container-daily"></div>
						<?php }  if($_GET['data']=='weekly'){?>
						 <div id="container-weekly"></div>
						<?php }  if($_GET['data']=='monthly'){?>
						 <div id="container-monthly"></div>
						<?php }  if($_GET['data']=='yearly'){?>
						 <div id="container-yearly"></div>
						<?php } ?>
					</div>
                </div>
              </div>
            </div>
            </div>
            <!-- / Content -->

    <?php include("footer.php");?>      