  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/customer.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
              <div class="col-lg-12 col-md-12 order-1">
				    <ul class="nav nav-pills mb-3" role="tablist">
                      <li class="nav-item">
                        <a
						  href="customer.php" 
                          type="button"
                          class="nav-link "
                        >
                          Customers
                        </a>
                      </li>
                      <li class="nav-item">
                        <a
						  href="customer-record.php" 
                          type="button"
                          class="nav-link active"
                        >
                          Customers Behavior
                        </a>
                      </li>
                     
                    </ul>
				<div class="card">

                 <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Name</th>
                    <th scope="col"  class="text-center">Address</th>
                    <th scope="col"  class="text-center">Contact</th>
                    <th scope="col"  class="text-center">Number of Orders</th>
                    <th scope="col"  class="text-center">Total Amount</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $customer_record->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->firstname . ' '. $val->lastname;?></td>
                    <td class="text-center"><?php echo $val->address;?></td>
                    <td class="text-center"><?php echo $val->contact;?></td>
                    <td class="text-center"><?php echo $val->count_order;?></td>
                    <td class="text-center">
					₱ 
					<?php
					$transcode =  $val->transcode;
					$order_total = $mysqli->query("SELECT SUM(a.qty * b.item_price) total from pos_order a left join pos_items b on a.item_id = b.item_id where a.trans_code='$transcode'");
					$row = $order_total->fetch_row();
					echo number_format($row[0],2);
					?>
					
					</td>
                  </tr>
				
                <?php } ?>
                </tbody>
              </table>
                </div>
                </div>
         
              </div>
            
            </div>
            <!-- / Content -->

    <?php include("footer.php");?>      