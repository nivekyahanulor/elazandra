	<?php session_start();?>
	<?php include("header.php");?>
	<?php include('controller/order.php');?>
      
  <body>

   
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand d-inline-flex" href="index.php"><img class="d-inline-block" src="../admin/assets/logo/<?php echo $sval[7];?>" alt="logo" width="100px"/><span class="text-1000 fs-3 fw-bold ms-2 text-gradient"><?php echo $sval[1];?></span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 my-2 mt-lg-0" id="navbarSupportedContent">
            <div class="mx-auto pt-5 pt-lg-0 d-block d-lg-none d-xl-block">
            
            </div>
			
              <a href="profile.php"> <?php echo $_SESSION['name'];?> :  </a>
			  <a href="cart.php"> <span class="bi bi-cart4 fs-1"></span><span class="badge badge-warning"><?php echo $cntrow['count_val'];?></span></a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="orders.php"> Orders </a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="logout.php"> Logout</a>
			</span>
          </div>
        </div>
      </nav>
     <br>
      <section class="py-0">
		<div class="col-lg-6 text-center mx-auto mb-3 mb-md-5 mt-4">
                <h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-6">SELECT <?php echo $_GET['data'];?></h5>
       </div>
        <div class="container"> 
		<?php if(isset($_GET['added'])){?>
		  	<div class="alert alert-info alert-dismissable">
				<strong>Order Added!</strong> Please see your cart!
			</div>
		<?php } ?>
          <div class="row">
		     <?php
			    $cat_id = $_GET['id'];
				$menu = $mysqli->query("SELECT * from pos_items where category='$cat_id'");
				while($val2 = $menu->fetch_object()){	
			   ?>
			    
					<div class="col-md-4  mb-5 h-100">
					<form method="post">
                        <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="../admin/assets/menu/<?php echo $val2->image;?>" width="350px" height="350px"/>
                          <div class="card-body ps-0">
                            <h4 class="fw-bold text-1000 text-truncate mb-1"><?php echo $val2->item_name;?></h4>
							<h4 class="text-2000 fw-bold"> ₱ <?php echo number_format($val2->item_price,2);?></h4>
                          </div>
                        </div>
							<input type="hidden" value="<?php echo $_GET['data'];?>" name="data">
							<input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
							<input type="hidden" value="<?php echo $val2->item_id;?>" name="item_id">
							<input type="hidden" value="<?php echo $_SESSION['id'];?>" name="customer_id">
							<div class="d-grid gap-2"><button type="submit" class="btn btn-lg btn-danger" name="add-order">ADD TO CART</button></div>
						</form>	
                      </div>
				<?php } ?>
          </div>
        </div><!-- end of .container-->

      </section>
	  
   <?php include("footer.php");?>