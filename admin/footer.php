  <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                 Copyright © 2022 ALL RIGHTS RESERVED | <b> <?php echo $sval[1];?> </b>
                
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/js/pages-account-settings-account.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>
	
    <script src="assets/simple-datatables/simple-datatables.js"></script>
	<script src="assets/js/moment.js"></script>
	
	<script src="assets/datatable/datatables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	<script>
	$(document).ready(function() {
            $('#table_id').DataTable({
                pageLength: 10,
            });
		$('#order_statuse').on('change', function() {
		 if( this.value ==4){
			 $("#reschude_date").show();
			 $("#reschude_time").show();
		 } else {
			  $("#reschude_date").hide();
			 $("#reschude_time").hide();
		 }
		});
     });
	</script>
	<?php
    $time_table = $mysqli->query("SELECT a.* ,b.* from pos_checkout_order a LEFT JOIN pos_customer b on a.customer_id = b.customer_id");
	$calendar = array();
	
			while($res = $time_table->fetch_object()){ 
				 $start = $res->delivery_date;
				 $startDate  = date("Y-m-d", strtotime($start));
				 $calendar[] = array( 
									  "transcode" => $res->transcode,
									  "contact" => $res->contact,
									  "email" => $res->email,
									  "date_added" => $res->date_added,
									  "meal_status" => $res->meal_status,
									  "status" => $res->status,
									  "delivery_date" => $res->delivery_date,
									  "title" => $res->firstname . ' ' . $res->lastname,
									  "start" => $startDate."T".$res->delivery_time.":00",
									  "backgroundColor" => "blue",
									  "count" => "0",
									);
			}
  ?>
  <script>
  	
	$(document).ready(function() {
		$('#closecalendar').click(function() {
			$('#calendarmodal').modal('hide');
		});
		$('#calendar').fullCalendar({
			allDayDefault: false,
			defaultView: 'agendaWeek',
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'agendaWeek'
			},
			  views: {
				month: { columnHeaderFormat: 'ddd', displayEventEnd: true, eventLimit: 3 },
				week: { columnHeaderFormat: 'ddd DD', titleRangeSeparator: ' \u2013 ' },
				day: { columnHeaderFormat: 'dddd' },
			},
			selectable: true,
			events: <?php echo json_encode($calendar);?>,
			

			eventClick:  function(event, jsEvent, view) {
					 $('#calendarmodal').modal('show');
					 $('.modal').find('#name').html('Customer Name :' + event.title + '<br>'); 
					 $('.modal').find('#contact').html('Contact # :' + event.contact + '<br>'); 
					 $('.modal').find('#email').html('Email : ' + event.email + '<br>'); 
					 $('.modal').find('#transcode').html('Trans Code : ' + event.transcode + '<br>'); 
					// $('.modal').find('#orderdate').html('Date Ordered : <br>' +$.fullCalendar.moment(event.date_added).format('YYYY/MM/DD')+ '<br><br>');
					 $('.modal').find('#orderdate').html('Date Ordered: ' + event.date_added + '<br>'); 
					 $('.modal').find('#delivery_date').html('Delivery Date: ' + event.delivery_date + '<br>'); 
					 if(status != 1){
						$('.modal').find('#paymentstatus').html('Payment Status: Paid' + '<br>');
					 }					 
					$('.modal').find('#paymentmethod').html('Payment Method: GCASH' + '<br>');
					$('.modal').find('#mealstatus').html('Meal Status: '  + event.meal_status + '<br>'); 
					$('.modal').find('#view_orders').html('<a href="order-details.php?data-transcode='+ event.transcode + '" target="_blank">View Orders</a>'); 
					 
					
        }, eventRender: function(info,cell) {
			if(info.count ==1){
				$('.fc-day[data-date="'+$.fullCalendar.moment(info.start).format()+'"]').css('background', "red");
			}
		  }
		});
		
	});
  
  
  </script>
  	<div class="modal" id="calendarmodal" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Order Details</h5>
              
              </div>
              <div class="modal-body">
											
						 <div id="name"></div>
						 <div id="contact"></div>
						 <div id="email"></div>
						 <div id="transcode"></div>
						 <div id="orderdate"></div>
						 <div id="delivery_date"></div>
						 <div id="paymentstatus"></div>
						 <div id="paymentmethod"></div>
						 <div id="mealstatus"></div>
						 <div id="view_orders"></div>
					
											
              </div>
			   <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" id="closecalendar" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
	<?php
	$daily_report = $mysqli->query("SELECT sum(b.item_price * a.qty)price,c.status as order_status, d.name category_name 
								from pos_order a 
								left join pos_items b on a.item_id = b.item_id 
								left join pos_checkout_order c on c.transcode =a.trans_code 
								left join pos_item_category d on d.category_id =b.category where c.status = '6' group by d.name");
	$dailyres = array();
	while($daily = $daily_report->fetch_object()){ 
		 $dailyres[] = array("name" => $daily->category_name,
							 "y" => $daily->price
						);
	}
	
	$weekly_report = $mysqli->query("select t.d,price   from 
									( select 'Saturday' as d union all select 'Sunday' 
									union all select 'Monday' union all select 'Tuesday' 
									union all select 'Wednesday' union all select 'Thursday' 
									union all select 'Friday' )t 
									left join ( SELECT DAYNAME(c.date_added) AS DAY, 
									IFNULL(SUM(b.item_price * a.qty), 0) price FROM `pos_order` a 
									left join pos_items b on a.item_id = b.item_id left 
									join pos_checkout_order c on c.transcode =a.trans_code 
									left join pos_item_category d on d.category_id =b.category
									WHERE c.status = '6' and c.date_added >= DATE(NOW()) - INTERVAL 7 DAY GROUP BY DAY )t1 on t.d=t1.day");
	$weeklyres = array();
	while($weekly = $weekly_report->fetch_object()){ 
		 $weeklyres[] = array("name" => $weekly->d,
							   "y" => $weekly->price
						);
	}
	
	$yearly_report = $mysqli->query("SELECT   YEAR(c.date_added) year, sum(b.item_price * a.qty)price  from pos_order a 
									left join pos_items b on a.item_id = b.item_id 
									left join pos_checkout_order c on c.transcode =a.trans_code 
									left join pos_item_category d on d.category_id  =b.category 
									where c.status = '6'  group by  YEAR(c.date_added)");
	$yearlyres = array();
	while($yearly = $yearly_report->fetch_object()){ 
		 $yearlyres[] = array("name" => $yearly->year,
							   "y" => $yearly->price
						);
	}
	
	$monthly_report = $mysqli->query("SELECT 
			SUM(IF(month = 'Jan', total, 0)) AS 'Jan', 
			SUM(IF(month = 'Feb', total, 0)) AS 'Feb', 
			SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
			SUM(IF(month = 'Apr', total, 0)) AS 'Apr', 
			SUM(IF(month = 'May', total, 0)) AS 'May', 
			SUM(IF(month = 'Jun', total, 0)) AS 'Jun', 
			SUM(IF(month = 'Jul', total, 0)) AS 'Jul', 
			SUM(IF(month = 'Aug', total, 0)) AS 'Aug', 
			SUM(IF(month = 'Sep', total, 0)) AS 'Sep', 
			SUM(IF(month = 'Oct', total, 0)) AS 'Oct', 
			SUM(IF(month = 'Nov', total, 0)) AS 'Nov', 
			SUM(IF(month = 'Dec', total, 0)) AS 'Dec' 
			FROM ( SELECT DATE_FORMAT(c.date_added, '%b') AS month, 
			sum(b.item_price * a.qty)total
			from pos_order a 
            left join pos_items b on a.item_id = b.item_id 
            left join pos_checkout_order c on c.transcode =a.trans_code 
            left join pos_item_category d on d.category_id  =b.category 
             WHERE c.date_added <= NOW() and c.date_added >= Date_add(Now(),interval - 12 month) and c.status = '6'
			GROUP BY DATE_FORMAT(c.date_added, '%m-%Y')) as sub");
	$row1    = $monthly_report->fetch_assoc();
			foreach($row1 as $val => $res){
					$month[] =  $val;
					$value[] =  $res;
			}
	
	?>
	<script>
	// DAILY
	Highcharts.chart('container-yearly', {
		chart: {
			type: 'column'
		},
		title: {
			align: 'center',
			text: 'Yearly Sales Report'
		},
		accessibility: {
			announceNewData: {
				enabled: true
			}
		},
		xAxis: {
			type: 'category'
		},
		yAxis: {
			title: {
				text: 'Total Sales'
			}

		},
		legend: {
			enabled: false
		},
		plotOptions: {
			series: {
				borderWidth: 0,
				dataLabels: {
					enabled: true,
					format: '{point.y}'
				}
			}
		},

		tooltip: {
			headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
		},

		series: [
			{
				name: "Browsers",
				colorByPoint: true,
				data: <?php echo json_encode($yearlyres,JSON_NUMERIC_CHECK);?>
			}
		]
	});
  </script>
  <script>
	// DAILY
	Highcharts.chart('container-daily', {
		chart: {
			type: 'column'
		},
		title: {
			align: 'center',
			text: 'Daily Sales Report'
		},
		accessibility: {
			announceNewData: {
				enabled: true
			}
		},
		xAxis: {
			type: 'category'
		},
		yAxis: {
			title: {
				text: 'Total Sales'
			}

		},
		legend: {
			enabled: false
		},
		plotOptions: {
			series: {
				borderWidth: 0,
				dataLabels: {
					enabled: true,
					format: '{point.y}'
				}
			}
		},

		tooltip: {
			headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
		},

		series: [
			{
				name: "Browsers",
				colorByPoint: true,
				data: <?php echo json_encode($dailyres,JSON_NUMERIC_CHECK);?>
			}
		]
	});
  </script>
  <script>
	//WEEKLY
	
	Highcharts.chart('container-weekly', {
		chart: {
			type: 'column'
		},
		title: {
			align: 'center',
			text: 'Weekly Sales Report'
		},
		accessibility: {
			announceNewData: {
				enabled: true
			}
		},
		xAxis: {
			type: 'category'
		},
		yAxis: {
			title: {
				text: 'Total Sales'
			}

		},
		legend: {
			enabled: false
		},
		plotOptions: {
			series: {
				borderWidth: 0,
				dataLabels: {
					enabled: true,
					format: '{point.y}'
				}
			}
		},

		tooltip: {
			headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
		},

		series: [
			{
				name: "Day",
				colorByPoint: true,
				data: <?php echo json_encode($weeklyres,JSON_NUMERIC_CHECK);?>
			}
		]
	});

	</script>
	<script>
	Highcharts.chart('container-monthly', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'MONTHLY SALES REPORTS ' + <?php echo date('Y');?>
		},
		subtitle: {
		},
		xAxis: {
			categories: <?php echo json_encode($month);?>
		},
		yAxis: {
			title: {
				text: ' SALES'
			},
			labels: {
				formatter: function () {
					return Highcharts.numberFormat(this.value,0);
				}
			}
		},
		tooltip: {
			crosshairs: true,
			shared: true
		},
	   
		series: [{
			name: 'SALES',
			color: '#0066FF',
			data: <?php echo json_encode($value,JSON_NUMERIC_CHECK);?>

		}]
	});
	</script>
  </body>
</html>
