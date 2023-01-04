	<?php include("header.php");?>
	<?php include('controller/order-history.php');?>
				<div class="row justify-content-center">
				<div class="col-lg-10">
							
					<table class="table table-bordered table-hover" id="table_id">
		                 <thead>
                            <tr bgcolor="#334e6c">
                                <th data-priority="1" style="color:#fff;">Transaction Code</th>
                                <th style="color:#fff;">Total Price</th>
                                <th style="color:#fff;">Status</th>
                                <th style="color:#fff;">Order Date</th>
                            </tr>
                        </thead>
                        <tbody><!-- Button trigger modal -->

						<?php while($val1 = $checkout1->fetch_object()){	?>
                            <tr>
                                <td><a href="#" data-toggle="modal" data-target="#view-details<?php echo $val1->transcode;?>"><?php echo $val1->transcode;?></a></td>
                                <td>₱ <?php 
								if($val1->delivery_option == 'Deliver'){ 
									$deliverfee = 30;
									} else {
									$deliverfee = 0;
									}
									echo number_format($val1->price + $deliverfee,2);?>
								</td>
                                <td><?php 
								if($val1->order_status==1){ echo 'Pending'; } 	
								else if($val1->order_status==2){ echo 'Approved'; } 
								else if($val1->order_status==5){ echo 'Cancelled'; } 
								else if($val1->order_status==6){ echo 'Completed'; } 
								?></td>
                                <td><?php echo $val1->date_added;?></td>
                            </tr>
							<div class="modal fade" id="view-details<?php echo $val1->transcode;?>"  role="dialog"  tabindex="-1">
							<div class="modal-dialog modal-dialog-centered">
							  <div class="modal-content">
								<div class="modal-header">
								  <h5 class="modal-title"> Order Details </h5>
								  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
								<?php
								$transcode  = $val1->transcode;
								$orders1    = $mysqli->query("SELECT a.* ,b.* from pos_order a left join pos_items b on a.item_id = b.item_id where a.status = 1 and a.trans_code='$transcode' ");
								while($val2 = $orders1->fetch_object()){	
								?>
								 <div class="alert alert-info">
									Item Name : <?php echo $val2->item_name;?><br>
									Price : <?php echo number_format($val2->item_price,2);?><br>
									Qty : <?php echo $val2->qty;?><br>
									Total : <?php echo number_format($val2->item_price * $val2->qty,2);?>
								</div>
								<?php } ?>
								</div>
								<div class="modal-footer">
								<button type="button" class="btn btn-default btn-warning" data-dismiss="modal">Close</button>
								</div>
							  </div>
							</div>
						</div>
						<?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
     
    <br> <br> <br> <br> <br>
    <br> <br> <br> <br> <br>
	<?php include("footer.php");?>