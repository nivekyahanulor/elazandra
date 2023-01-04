  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/supplier.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

              <h5 class="card-title"><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-user"> <i class="bi bi-person-plus-fill"></i> Add Supplier</button></h5>
              <div class="col-lg-12 col-md-12 order-1">

				
				  <div class="card">
                 <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Name</th>
                    <th scope="col"  class="text-center">Contact</th>
                    <th scope="col"  class="text-center">Address</th>
                    <th scope="col"  class="text-center">Date Added</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $pos_supplier->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->name;?></td>
                    <td class="text-center"><?php echo $val->contact;?></td>
                    <td class="text-center"><?php echo $val->address;?></td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                    <td class="text-center">
						<button class="btn btn-warning  btn-sm" data-bs-toggle="modal" data-bs-target="#delete-customer<?php echo $val->supplier_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
					
					 <div class="modal fade" id="delete-customer<?php echo $val->supplier_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Supplier</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Supplier Data?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->supplier_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-supplier">Delete </button>
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
			<div class="modal fade" id="add-user" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Supplier Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post" id="add-form">
					
						<div class="col-12">
						  <label for="inputNanme4" class="form-label"> Name: </label>
						  <input type="text" class="form-control" name="name" id="fname" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Contact : </label>
						  <input type="text" class="form-control" id="lname" name="contact" required>
						</div>
						
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Address: </label>
						  <input type="text" class="form-control" id="username" name="address" required>
						</div>
						
                    <div class="modal-footer">
                      <button type="submit" name="add-supplier" class="btn btn-primary" name="">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
			</div>
			</div>
    <?php include("footer.php");?>      