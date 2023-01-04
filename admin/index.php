  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/dashboard.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
           
                <div class="col-lg-12 col-md-12 order-1">
                  <div class="row">
					
					
					<div class="col-lg-4 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title">
                            <div class=" flex-shrink-0">
                              <span class=""><i class="bi bi-bag"></i> PENDING ORDERS</span>
                            </div>
                          </div> 
						    <h2 class="card-title mb-2">
							<center>  <?php echo $totalpendingorders;?> </center>
						   </h2>
                        </div>
                      </div>
                    </div>
					
					<div class="col-lg-4 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title">
                            <div class=" flex-shrink-0">
                              <span class=""><i class="bi bi-check-circle-fill"></i> FOR DELIVERY </span>
                            </div>
                          </div> 
						    <h2 class="card-title mb-2">
							<center>  <?php echo $totaldeliveryorders;?> </center>
						   </h2>
                        </div>
                      </div>
                    </div>
					<div class="col-lg-4 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title">
                            <div class=" flex-shrink-0">
                              <span class=""><i class="bi bi-check-square-fill"></i> COMPLETED ORDERS</span>
                            </div>
                          </div> 
						    <h2 class="card-title mb-2">
							<center>  <?php echo $totalcompletedorders;?> </center>
						   </h2>
                        </div>
                      </div>
                    </div>
					<div class="col-lg-4 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title">
                            <div class=" flex-shrink-0">
                              <span class=""><i class="bi bi-exclamation-circle"></i> CANCELLED ORDERS</span>
                            </div>
                          </div> 
						    <h2 class="card-title mb-2">
							<center>  <?php echo $totalcancelledorders;?> </center>
						   </h2>
                        </div>
                      </div>
                    </div>
					<div class="col-lg-4 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title">
                            <div class=" flex-shrink-0">
                              <span class=""> <i class="bi bi-people-fill"></i> TOTAL CUSTOMERS</span>
                            </div>
                          </div> 
						    <h2 class="card-title mb-2">
							<center>  <?php echo $totalcustomers;?> </center>
						   </h2>
                        </div>
                      </div>
                    </div>
					<div class="col-lg-4 col-md-4 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title">
                            <div class=" flex-shrink-0">
                              <span class=""><i class="bi bi-person-circle"></i> TOTAL ADMINISTRATORS</span>
                            </div>
                          </div> 
						    <h2 class="card-title mb-2">
							<center>  <?php echo $totalpos_users;?> </center>
						   </h2>
                        </div>
                      </div>
                    </div>
               
                  </div>
                </div>
         
              </div>
            
            </div>
            <!-- / Content -->

    <?php include("footer.php");?>      