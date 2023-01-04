  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/inventory.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
				<h5 class="card-title"><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-item"> <i class="bi bi-plus-square"></i> Add Products </button></h5>
                
				<div class="col-lg-12 col-md-12 order-1">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
					  <a href="products.php" class="nav-link ">LIST</a>
					</li>
					<li class="nav-item">
					  <a href="archived.php" class="nav-link active" >ARCHIVED</a>
					</li>
				 </ul>

				<div class="card">
				<br>
                 <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Image</th>
                    <th scope="col"  class="text-center">Name</th>
                    <th scope="col"  class="text-center">Price</th>
                    <th scope="col"  class="text-center">Category</th>
                    <th scope="col"  class="text-center">Stock Sizes</th>
                    <th scope="col"  class="text-center">Date Added</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $archived->fetch_object()){ ?>
				  <tr>
                    <td class="text-center"><img src="assets/menu/<?php echo $val->image;?>" width="200"></td>
                    <td class="text-center"><?php echo $val->item_name;?></td>
                    <td class="text-center"> ₱ <?php echo number_format($val->item_price,2);?></td>
                    <td class="text-center"><?php echo $val->category;?></td>
                    <td class="text-center">
						Small - <?php if( $val->small == 0){ ?>
									<span class="badge rounded-pill bg-danger"> Out of Stock </span> 
								<?php } else if( $val->small <= 10){ ?>
									<span class="badge rounded-pill bg-warning"> <?php echo $val->small;?> Critical Stock </span>   
								<?php } else { ?>
									<?php echo $val->small;?> 
								<?php } ?>
						<br>
						Meduim - <?php if( $val->meduim == 0){ ?>
									<span class="badge rounded-pill bg-danger"> Out of Stock </span> 
								<?php } else if( $val->meduim <= 10){ ?>
									<span class="badge rounded-pill bg-warning"> <?php echo $val->meduim;?> Critical Stock </span>   
								<?php } else { ?>
									<?php echo $val->meduim;?> 
								<?php } ?>
						<br>
						Large - <?php if( $val->large == 0){ ?>
									<span class="badge rounded-pill bg-danger"> Out of Stock </span> 
								<?php } else if( $val->large <= 10){ ?>
									<span class="badge rounded-pill bg-warning"> <?php echo $val->large;?> Critical Stock </span>   
								<?php } else { ?>
									<?php echo $val->large;?> 
								<?php } ?>
						<br>
						XL -    <?php if( $val->xl == 0){ ?>
									<span class="badge rounded-pill bg-danger"> Out of Stock </span> 
								<?php } else if( $val->xl <= 10){ ?>
									<span class="badge rounded-pill bg-warning"> <?php echo $val->xl;?> Critical Stock </span>   
								<?php } else { ?>
									<?php echo $val->xl;?> 
								<?php } ?>
						<br>
						XXL -   <?php if( $val->xxl == 0){ ?>
									<span class="badge rounded-pill bg-danger"> Out of Stock </span> 
								<?php } else if( $val->xxl <= 10){ ?>
									<span class="badge rounded-pill bg-warning"> <?php echo $val->xxl;?> Critical Stock </span>   
								<?php } else { ?>
									<?php echo $val->xxl;?> 
								<?php } ?>
						<br>
						XXXL -  <?php if( $val->xxxl == 0){ ?>
									<span class="badge rounded-pill bg-danger"> Out of Stock </span> 
								<?php } else if( $val->xxxl <= 10){ ?>
									<span class="badge rounded-pill bg-warning"> <?php echo $val->xxxl;?> Critical Stock </span>   
								<?php } else { ?>
									<?php echo $val->xxxl;?> 
								<?php } ?>
					</td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                    <td class="text-center">
						<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-item<?php echo $val->item_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete-item<?php echo $val->item_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				  
				  
					 <div class="modal fade" id="edit-item<?php echo $val->item_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered modal-lg">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Product</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" enctype="multipart/form-data" method="post">
						   <div class="row">
							<div class="col-6">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Name: </label>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->item_id;?>" required>
							  <input type="text" class="form-control" name="name" value="<?php echo $val->item_name;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Price: </label>
							  <input type="text" class="form-control" name="price"  value="<?php echo $val->item_price;?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							</div>
							<div class="col-12" id="item-category">
							  <label for="inputNanme4" class="form-label">Item Category: </label>
							  <select class="form-control" name="category"  required>
								<option value=""> - Select Category - </option>
								<?php
									$category = $mysqli->query("SELECT * from pos_item_category");
										while($val2 = $category->fetch_object()){
											if($val->category_id == $val2->category_id){
												echo "<option value=". $val2->category_id ." selected>" .  $val2->name . "</option>";
											} else { 
												echo "<option value=". $val2->category_id .">" .  $val2->name . "</option>";
											}
										}
								?>
							  </select>
							</div>
						
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Description: </label>
							  <textarea type="text" class="form-control" name="description" required><?php echo $val->description;?></textarea>
							</div>
							
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Image: </label>
							  <input type="file" class="form-control" name="image" id="item_price">
							  <input type="hidden" class="form-control" name="image1"  value="<?php echo $val->image;?>" >
							</div>
							
							<div class="col-12" id="item-category">
							  <label for="inputNanme4" class="form-label">RETRIEVE: </label>
							  <select class="form-control" name="archived"  required>
								<option value=""> - Select  - </option>
								<option value="0"> Yes </option>
								<option value="1"> No </option>
							  </select>
							</div>
							
							</div>
							<div class="col-6">

							<h5> Stock Sizes </h5>

							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Small: </label>
							  <input type="text" class="form-control" name="small" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  value="<?php echo $val->small;?>" required>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Meduim: </label>
							  <input type="text" class="form-control" name="meduim" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  value="<?php echo $val->meduim;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Large: </label>
							  <input type="text" class="form-control" name="large" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  value="<?php echo $val->large;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Extra Large: </label>
							  <input type="text" class="form-control" name="xl" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $val->xl;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">XXL: </label>
							  <input type="text" class="form-control" name="xxl" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  value="<?php echo $val->xxl;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">XXXL: </label>
							  <input type="text" class="form-control" name="xxxl" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $val->xxxl;?>" required>
							</div>
							
							
						</div>
							</div>
								<div class="modal-footer">
								  <button type="submit" class="btn btn-primary" name="update-item">Save </button>
								  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								</div>
								</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-item<?php echo $val->item_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Product</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Product Data?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->item_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-item">Delete </button>
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
		<div class="modal fade" id="add-item" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"> Product Details </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form method="post"  enctype="multipart/form-data">
						<div class="col-12">
						<div class="row">
						<div class="col-6">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Name: </label>
							  <input type="text" class="form-control" name="name" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Price: </label>
							  <input type="text" class="form-control" name="price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							</div>
							<div class="col-12" id="item-category">
							  <label for="inputNanme4" class="form-label">Item Category: </label>
							  <select class="form-control" name="category"  required>
								<option value=""> - Select Category - </option>
								<?php
									$category = $mysqli->query("SELECT * from pos_item_category");
										while($val2 = $category->fetch_object()){
											echo "<option value=". $val2->category_id .">" .  $val2->name . "</option>";
										}
								?>
							  </select>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Description: </label>
							  <textarea type="text" class="form-control" name="description" required></textarea>
							</div>
						
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Image: </label>
							  <input type="file" class="form-control" name="image" id="item_price"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
							</div>
						</div>
						<div class="col-6">

							<h5> Stock Sizes </h5>

							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Small: </label>
							  <input type="text" class="form-control" name="small" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Meduim: </label>
							  <input type="text" class="form-control" name="meduim" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Large: </label>
							  <input type="text" class="form-control" name="large" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Extra Large: </label>
							  <input type="text" class="form-control" name="xl" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">XXL: </label>
							  <input type="text" class="form-control" name="xxl" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">XXXL: </label>
							  <input type="text" class="form-control" name="xxxl" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
							</div>
							
							
						</div>
						</div>
						</div>
						
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-item">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
    <?php include("footer.php");?>      