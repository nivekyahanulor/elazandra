	<?php include("header.php");?>

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
	
			<?php 
				$id         = $_GET['id'];
				$products   = $mysqli->query("SELECT * from pos_items where item_id='$id'");
				while($valp = $products->fetch_object()){	
			?>
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="../admin/assets/menu/<?php echo $valp->image;?>" alt="Image">
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-7 pb-5">
				<?php if(isset($_GET['added'])){?>
				<div class="alert alert-info alert-dismissable">
					<strong>Order Added!</strong> Please see your cart!
				</div>
				<?php } ?>
				<form method="post">
                <h3 class="font-weight-semi-bold"><?php echo $valp->item_name;?></h3>

                <h3 class="font-weight-semi-bold mb-4"> ₱ <?php echo number_format($valp->item_price,2);?></h3>
                <p class="mb-4"><b>Description :</b> <br> <?php echo $valp->description;?></p>
				<hr>
				<div class="row">
				<div class="col-lg-6">
				<b>Sizes :</b> 
				<p class="mb-1">
				 <?php if( $valp->small == 0){ $s = 1; ?>
				  <input type="radio" name="size" class="form-conrol" disabled> 
				 <?php } else { ?>
				  <input type="radio" name="size" class="form-conrol" value="small"> 
				 <?php } ?>
				  Small - <?php if( $valp->small == 0){ ?>
									<span class="badge rounded-pill bg-danger" style="color:#fff;"> Out of Stock </span> 
								<?php } else { ?>
									<?php echo $valp->small;?> 
								<?php } ?>
				</p>
				 <p class="mb-1">
				  <?php if( $valp->meduim == 0){ $m = 1; ?>
				  <input type="radio" name="size" class="form-conrol" disabled> 
				 <?php } else { ?>
				  <input type="radio" name="size" class="form-conrol" value="meduim"> 
				 <?php } ?>
						Meduim - <?php if( $valp->meduim == 0){ ?>
									<span class="badge rounded-pill bg-danger" style="color:#fff;"> Out of Stock </span> 
								<?php } else { ?>
									<?php echo $valp->meduim;?> 
								<?php } ?>
				</p>
				 <p class="mb-1">
				  <?php if( $valp->large == 0){ $l= 1; ?>
				  <input type="radio" name="size" class="form-conrol" disabled> 
				 <?php } else { ?>
				  <input type="radio" name="size" class="form-conrol" value="large"> 
				 <?php } ?>
						Large - <?php if( $valp->large == 0){ ?>
									<span class="badge rounded-pill bg-danger" style="color:#fff;"> Out of Stock </span> 
								<?php } else { ?>
									<?php echo $valp->large;?> 
								<?php } ?>
				</p>
				 <p class="mb-1">
				  <?php if( $valp->xl == 0){ $xl= 1; ?>
				  <input type="radio" name="size" class="form-conrol" disabled> 
				 <?php } else { ?>
				  <input type="radio" name="size" class="form-conrol"  value="xl"> 
				 <?php } ?>
						XL -    <?php if( $valp->xl == 0){ ?>
									<span class="badge rounded-pill bg-danger" style="color:#fff;"> Out of Stock </span> 
								<?php } else { ?>
									<?php echo $valp->xl;?> 
								<?php } ?>
				</p>
				 <p class="mb-1">
				 <?php if( $valp->xxl == 0){ $xxl= 1; ?>
				  <input type="radio" name="size" class="form-conrol" disabled> 
				 <?php } else { ?>
				  <input type="radio" name="size" class="form-conrol" value="xxl"> 
				 <?php } ?>
						XXL -   <?php if( $valp->xxl == 0){ ?>
									<span class="badge rounded-pill bg-danger" style="color:#fff;"> Out of Stock </span> 
								<?php } else { ?>
									<?php echo $valp->xxl;?> 
								<?php } ?>
				</p>
				 <p class="mb-1">
				  <?php if( $valp->xxxl == 0){ $xxxl= 1; ?>
				  <input type="radio" name="size" class="form-conrol" disabled> 
				  <?php } else { ?>
				  <input type="radio" name="size" class="form-conrol"  value="xxxl"> 
				  <?php } ?>
						XXXL -  <?php if( $valp->xxxl == 0){ ?>
									<span class="badge rounded-pill bg-danger" style="color:#fff;"> Out of Stock </span> 
								<?php } else { ?>
									<?php echo $valp->xxxl;?> 
								<?php } ?>
				</p>
				</div>
				
				</div>
				<hr>
                
                <div class="d-flex align-items-center mb-4 pt-2">
					<input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
					<input type="hidden" value="<?php echo $valp->item_id;?>" name="item_id">
					<input type="hidden" value="<?php echo $_SESSION['id'];?>" name="customer_id">
					<?php $d  = $s + $m + $l + $xl + $xxl + $xxxl;
						  if($d == 6){
					?>
						<button type="button" class="btn btn-danger px-3"  name="add-order"><i class="fa fa-shopping-cart mr-1" ></i> Out of Stock</button>
					<?php } else { ?>
						<button type="submit" class="btn btn-primary px-3"  name="add-order"><i class="fa fa-shopping-cart mr-1" ></i> Add To Cart</button>
					<?php } ?>
                </div>
				</form>
               
            </div>
			   
		
				 
        </div>
		<div class="row justify-content-center">
			<div class="col-lg-7 pb-5">
					  <h2> FEED BACK </h2>
					  <form method="post" action="controller/feedback.php" enctype="multipart/form-data">
					  <textarea class="form-control" name="feedback"></textarea>
					  UPLOAD IMAGE : 
					  <input type="file" class="form-control" name="image">
					  <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id'];?>">
					  <br>
					  <button class="btn btn-info"> ADD FEED BACK </button>
					  </form>
			<hr>
			<?php
			$pos_feedback   = $mysqli->query("SELECT * from pos_feedback where product_id='$id'");
			while($valf = $pos_feedback->fetch_object()){	?>
				
				<p> <?php echo $valf->feedback;?> <br> <img src="../assets/feedback/<?php echo $valf->image;?>" width="200px"></p>
			
			<?php } ?>
			
			</div>
		</div>
	<?php } ?>
    </div>
    <!-- Shop Detail End -->

	<?php include("footer.php");?>