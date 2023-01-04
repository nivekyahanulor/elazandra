  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/feedback.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                
				<div class="col-lg-12 col-md-12 order-1">
			
				<div class="card">
				<br>
                 <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Feed Back</th>
                    <th scope="col"  class="text-center">Image</th>
                    <th scope="col"  class="text-center">Date Added</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $customer->fetch_object()){ ?>
				  <tr>
                    <td class="text-center"><?php echo $val->feedback;?></td>
                    <td class="text-center"><img src="../assets/feedback/<?php echo $val->image;?>" width="200px"></td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                  </tr>
		
				
                <?php } ?>
                </tbody>
                </table>
                </div>
                </div>
         
              </div>
            
            </div>
         
    <?php include("footer.php");?>      