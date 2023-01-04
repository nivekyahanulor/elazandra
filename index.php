	<?php include("header.php");?>


    <!-- Products Start -->
	<?php 
	if(isset($_GET['data'])){
	?>
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2"><?php echo strtoupper($_GET['category']);?> PRODUCTS</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
			<?php 
			if(isset($_POST['search'])){
				$product    = $_POST['product'];
				$products   = $mysqli->query("SELECT * from pos_items where item_name LIKE '%$product%'");
			} else {
				$id         = $_GET['data'];
				$products   = $mysqli->query("SELECT * from pos_items where category='$id'");
			}
			while($valp = $products->fetch_object()){	
			?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
					
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
					<?php if($valp->is_best_seller ==1){?>
					 <div class="ribbon"><span>BEST SELLER</span></div>
					<?php } ?>
					<?php if($valp->is_hot ==1){?>
					 <div class="ribbon"><span>HOT ITEM</span></div>
					<?php } ?>
                        <img class="i" src="admin/assets/menu/<?php echo $valp->image;?>" width="300px" height="300px">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $valp->item_name;?></h6>
                        <div class="d-flex justify-content-center">
                            <h6> ₱ <?php echo number_format($valp->item_price,2);?></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center bg-light border">
                        <a href="product-details.php?id=<?php echo $valp->item_id;?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Details</a>
                    </div>
                </div>
            </div>
        
			<?php } ?>
           
        </div>
    </div>
	<?php } ?>

    <?php include("footer.php");?>