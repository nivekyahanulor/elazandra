  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/customer.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

			
              <div class="col-lg-12 col-md-12 order-1">

				
				  <div class="card">
                 <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Name</th>
                    <th scope="col"  class="text-center">Address</th>
                    <th scope="col"  class="text-center">Contact</th>
                    <th scope="col"  class="text-center">Date Added</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $customer->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->firstname . ' '. $val->lastname;?></td>
                    <td class="text-center"><?php echo $val->address;?></td>
                    <td class="text-center"><?php echo $val->contact;?></td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                    <td class="text-center">
						<button class="btn btn-warning  btn-sm" data-bs-toggle="modal" data-bs-target="#delete-customer<?php echo $val->customer_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
					
					 <div class="modal fade" id="delete-customer<?php echo $val->customer_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Customer</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Customer Data?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->customer_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-customer">Delete </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
					  </div>
					</div>
					</div>
                <?php } ?>
                </tbody>
              </table>
                </div>
                </div>
         
              </div>
            
            </div>
            <!-- / Content -->

    <?php include("footer.php");?>      