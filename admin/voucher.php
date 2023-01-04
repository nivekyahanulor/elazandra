  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/voucher.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
			  <h5 class="card-title"><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-category"> <i class="bi bi-plus"></i> Add Voucher</button></h5>

              <div class="col-lg-12 col-md-12 order-1">
			  <div class="card">

                 <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">Voucher</th>
                    <th class="text-center" scope="col">Discount</th>
                    <th class="text-center" scope="col">Date Added</th>
                    <th class="text-center" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $category->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->voucher;?></td>
                    <td class="text-center"><?php echo $val->discount;?> %</td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                    <td class="text-center">
						<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-category<?php echo $val->category_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete-category<?php echo $val->category_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
					 <div class="modal fade" id="edit-category<?php echo $val->category_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Voucher</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post" enctype="multipart/form-data">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Voucher: </label>
							  <input type="text" class="form-control" name="voucher" value="<?php echo $val->voucher;?>" required>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->voucher_id;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Discount: </label>
							  <input type="text" class="form-control" name="discount" value="<?php echo $val->discount;?>" required>
							</div>
							
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-primary" name="update-category">Update </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
					  </div>
					</div>
					</div>
					 <div class="modal fade" id="delete-category<?php echo $val->category_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Voucher</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Voucher?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->voucher_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-category">Delete </button>
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
			 <div class="modal fade" id="add-category" tabindex="-1">
					<div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title"> Voucher Discount</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post" enctype="multipart/form-data">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Voucher: </label>
							  <input type="text" class="form-control" name="voucher" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Discount (%): </label>
							  <input type="text" class="form-control" name="discount" required>
							</div>
							
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-primary" name="add-category">Save </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
					  </div>
					</div>
			</div>
			
		
    <?php include("footer.php");?>      