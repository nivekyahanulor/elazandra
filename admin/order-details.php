  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/orders.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
			
              <div class="col-lg-12 col-md-12 order-1">
			
				<div class="card">
                 <table class="table table-striped table-bordered" id="">
                 <thead>
                  <tr>
                    <th scope="col"  class="text-center">Transaction Code</th>
                    <th scope="col"  class="text-center">Customer Name</th>
                    <th scope="col"  class="text-center">Total Price</th>
                    <th scope="col"  class="text-center">Pre Order</th>
                    <th scope="col"  class="text-center">Date Ordered</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $checkout->fetch_object()){ ?>
				  <tr>
                    <td class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#view-details<?php echo $val->trans_code;?>"><?php echo $val->transcode;?></a></td>
                    <td class="text-center"><?php echo $val->firstname .' '. $val->lastname;?></td>
                    <td class="text-center"> ₱ <?php  if($val->delivery_option == 'Deliver'){ echo number_format($val->price + 30,2);} else { echo number_format($val->price,2); } ?></td>
                    <td class="text-center"><?php if($val->is_preorder == 1){ echo "Yes";} else { echo  "No";}?></td>
                    <td class="text-center"><?php echo $val->created_at;?></td>
				
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