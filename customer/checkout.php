	<?php include("header.php");?>

    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
							<tr bgcolor="#334e6c">
	                                <th style="color:#fff;">Name</th>
	                                <th style="color:#fff;">Price</th>
	                                <th style="color:#fff;">Quantity</th>
	                                <th style="color:#fff;">Total</th>
	                            </tr>
	                        </thead>
	                        <tbody>
							
							<?php
								$required = "";	
								while($val = $orders->fetch_object()){	
								$total += $val->item_price * $val->qty;
								
								
							?>
							<form method="post">
	                            <tr>
	                                <td><?php echo $val->item_name;?></td>   
									<td>₱ <?php echo number_format($val->item_price,2);?></td>
	                                <td>
	                                  	<?php echo $val->qty;?>
	                                </td>
									
	                                <td>₱ <?php echo number_format($val->item_price * $val->qty,2);?> </td>
	                               
	                            </tr>
							</form>
							<?php } ?>  
	                        </tbody>
	                    </table>
	                  
            </div>
            <div class="col-lg-4">
              <form method="post">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0" style="background-color:#334e6c !important;">
                        <h4 class="font-weight-semi-bold m-0" style="color:white !important;">Cart Summary</h4>
                    </div>
                    <div class="card-body">
				
					<div class="col-12">
						<?php if( $_GET['method'] == 'COD'){?>
						DELIVERY DETAILS : <b><?php echo $_GET['method'];?></b> <br>
						
						<?php
						while($val2 = $checkout->fetch_object()){	
							
								if($val2->voucher !=""){
								$voucher =  (($val2->voucher / 100) * $total);
								} else {
								$voucher =  0;
								}
								

						?>
							NAME : <b><?php echo $val2->name;?></b><br>
							CONTACT : <b><?php echo $val2->contact;?></b><br>
							EMAIL : <b><?php echo $val2->email;?></b><br>
							ADDRESS : <b><?php echo $val2->address;?></b>
						<?php } ?>
						<?php } else { } ?>
							PAYMENT METHOD : <b><?php echo $_GET['method'];?></b> <br>
							<?php
					    	while($val2 = $checkout->fetch_object()){	
								if($val2->voucher !=""){
								$voucher =  (($val2->voucher / 100) * $total);
								} else {
								$voucher =  0;
								}
								
					    	?>
							NAME : <b><?php echo $val2->name;?></b><br>
							CONTACT : <b><?php echo $val2->contact;?></b><br>
							EMAIL : <b><?php echo $val2->email;?></b><br>
							ADDRESS : <b><?php echo $val2->address;?></b>
						<?php } ?>
						<?php if($_GET['method'] == "BANK"){
						$required = "required";	
							?>
						<hr>
						<p class="mb-4" id="bank_details" ><b>Bank Details :</b> <br>
							BANK NAME : BPI <br>
							BANK ACCOUNT # : 123456789 <br>
							BANK ACCOUNT NAME : ELAZANDRA MNL
						<br>
						<b>BANK TRANSACTION CODE :</b> <br> 
						<input type="text"  class="form-control"  name="bank_transaction_code" placeholder="Insert Transaction Code" <?php echo $required;?>>
						</p>
						<?php } ?>
						</div>
						</p>
						<hr>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">₱ <?php echo number_format($total - $voucher ,2);?></h6>
                        </div>
						<?php //if( $_GET['method'] == 'COD'){?>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium"> ₱ 1.00</h6>
                        </div>
						<?php //} ?>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
							<?php if( $_GET['method'] == 'COD'){?>
                            <h5 class="font-weight-bold">₱ <?php echo number_format(($total - $voucher) + 1,2);?></h5>
							<?php } else { ?>
                            <h5 class="font-weight-bold">₱ <?php echo number_format(($total - $voucher) + 1,2);?></h5>
							<?php } ?>
                        </div>
                       	<?php 
                       	  $ato = ($total - $voucher) + 1;
                       	?>
						<input type="hidden" name="total" value="<?php echo $ato;?>">
						

						<?php if( $_GET['method'] == 'COD' || $_GET['method'] == 'BANK' ){?>
                        <button class="btn btn-block btn-primary my-3 py-3" name="confirm-order">Proceed To Payment</button>
						<?php } else { ?>
                        <button class="btn btn-block btn-primary my-3 py-3" name="payment-order">Proceed To Payment</button>
						<?php } ?>
                    </div>
                </div>
				</form>
            </div>
        </div>
    </div>
    <!-- Cart End -->
	<?php include("footer.php");?>