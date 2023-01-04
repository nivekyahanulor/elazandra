  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/item-category.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
			  <h5 class="card-title"><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-category"> <i class="bi bi-plus"></i> Add Category</button></h5>

              <div class="col-lg-12 col-md-12 order-1">
			  <div class="card">

                 <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Date Added</th>
                    <th class="text-center" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $category->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->name;?></td>
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
						  <h5 class="modal-title">Update Category</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post" enctype="multipart/form-data">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Name: </label>
							  <input type="text" class="form-control" name="category" value="<?php echo $val->name;?>" required>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->category_id;?>" required>
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
						  <h5 class="modal-title">Delete Category</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Supplier?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->category_id;?>" required>
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
						  <h5 class="modal-title"> Category</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post" enctype="multipart/form-data">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Name: </label>
							  <input type="text" class="form-control" name="category" required>
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