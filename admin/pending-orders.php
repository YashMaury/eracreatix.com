<?php
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	date_default_timezone_set('Asia/Kolkata'); // change according timezone
	$currentTime = date('d-m-Y h:i:s A', time());


?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin| Pending Orders</title>
		<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link type="text/css" href="css/theme.css" rel="stylesheet">
		<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
		<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
		<script language="javascript" type="text/javascript">
			var popUpWin = 0;

			function popUpWindow(URLStr, left, top, width, height) {
				if (popUpWin) {
					if (!popUpWin.closed) popUpWin.close();
				}
				popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
			}
		</script>
	</head>

	<body>
		<?php include('include/header.php'); ?>

		<div class="wrapper">
			<div class="container">
				<div class="row">
					<?php include('include/sidebar.php'); ?>
					<div class="span9">
						<div class="content">

							<div class="module">
								<div class="module-head">
									<h3>Pending Orders</h3>
								</div>
								<div class="module-body table">
									<?php if (isset($_GET['del'])) { ?>
										<div class="alert alert-error">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
										</div>
									<?php } ?>

									<br />


									<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-responsive">
										<thead>
													<tr>
												<th>#</th>
												<th>Order_id</th>
												<th> Name</th>
												<th width="50">Email /Contact no</th>
												<th>Shipping Address</th>
												<th>Billing Address</th>
												<th >Product Details</th>
												<th>Qty</th>
												<th>Amount </th>
												<th>Order Date</th>
												<th>Payment Status/Method</th>
												<th>Action</th>


											</tr>
										</thead>

										<tbody>
											<?php
											$status = 'Delivered';
											$status1 = 'Cancelled';
															$query1 = mysqli_query($con, "
													select users.name as username,
														   users.email as useremail,
														   users.contactno as usercontact,
														   address.shippingAddress as shippingaddress,
														   address.shippingCity as shippingcity,
														   address.shippingState as shippingstate,
														   address.shippingPincode as shippingpincode,
														   address.mobile_no as mobile_no, 
														   address.billingAddress as billingaddress,
														   address.billingCity as billingcity,
														   address.billingState as billingstate,
														   address.billingPincode as billingpincode,
														   GROUP_CONCAT(products.productName,':',products.productPrice,':',products.shippingCharge) as products,
														   products.productPrice as productprice,
														   products.shippingCharge as shippingcharge,
														   orders.orderStatus as orderstatus,
														   orders.order_id as order_id,
														   orders.quantity as quantity,
														   orders.size as size,
														   orders.color as color,
														   orders.orderDate as orderdate,
														   orders.paymentMethod as paymentMethod,
														   orders.GSTN as gstn,
														   orders.id as id,
														   products.skuId as skuid,
														    GROUP_CONCAT(orders.quantity,':',orders.size,':',orders.color) as ordersd
														   from orders 
														   join users on  orders.userId=users.id 
														   join address on users.id=address.user_id 
														   join products on products.id=orders.productId 
														   where orders.orderStatus!='$status' or orders.orderStatus!='$status1' or orders.orderStatus is null
														   GROUP BY orders.order_id");
										
											$cnt = 1;
											while ($row = mysqli_fetch_assoc($query1)) {
		
					                 $x=array_unique(explode(",",$row['ordersd']));
			
				                    $prod=array_unique(explode(",",$row['products']));
				
											?>
											
										
													
												<tr>
													<td><?php echo htmlentities($cnt); ?></td>
													<td><?php echo htmlentities($row['order_id']); ?></td>
													<td><?php echo htmlentities($row['username']); ?></td>
													<td><?php echo htmlentities($row['useremail']); ?>/<?php echo htmlentities($row['usercontact']); ?></td>
													<td><?php echo htmlentities($row['shippingaddress'] . "," . $row['shippingcity'] . "," . $row['shippingstate'] . "-" . $row['shippingpincode']); ?><br><?php echo isset($row['mobile_no']) ? "Mobile no.- " . $row['mobile_no'] : ""; ?></td>
													<td><?php echo htmlentities($row['billingaddress'] . "," . $row['billingcity'] . "," . $row['billingstate'] . "-" . $row['billingpincode']); ?> GSTN-<?php echo htmlentities($row['gstn']); ?></td>
													<td><?php 
										    	 for($i=0;$i<sizeof($x);$i++){
										    	     $prop=explode(":",$x[$i]);
										    	     echo "Product:".explode(":",$prod[$i])[0]."<br>";
													    echo "color :".$prop[2]."<br>";  
													      echo "size :".$prop[1]."<br><br>"; 
													} 
													
													 echo "Grand Total :"
													
											
													
													?>  </td>
													   	<td><?php for($j=0;$j<sizeof($x);$j++){
													     
													    echo explode(":",$x[$j])[0]."<br><br><br><br>"; 
													  
													}
													
													?></td>
													<td style="padding-bottom:0px;margin-bottom:0px"><?php 
													$total=0;
													for($k=0;$k<sizeof($x);$k++){
												
													     $price=explode(":",$prod[$k]);
													    $total+=explode(":",$x[$k])[0]*$price[1]+$price[2];
													    echo explode(":",$x[$k])[0]*$price[1]+$price[2]."<br><br>";
													  
													}
													echo "<p style='margin: 100% 0 1px;>".$total."</p>";
												
													?></td>
													<td><?php echo htmlentities($row['orderdate']); ?></td>
													<td><?php echo htmlentities($row['paymentMethod']); ?></td>
													<td> <a href="updateorder.php?oid=<?php echo htmlentities($row['id']); ?>" title="Update order" target="_blank"><i class="icon-edit"></i></a>
													</td>
												</tr>
												
												</tr>

											<?php $cnt = $cnt + 1;
											} ?>
										</tbody>
									</table>
								</div>
							</div>



						</div><!--/.content-->
					</div><!--/.span9-->
				</div>
			</div><!--/.container-->
		</div><!--/.wrapper-->

		<?php include('include/footer.php'); ?>

		<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
		<script src="scripts/datatables/jquery.dataTables.js"></script>
		<script>
			$(document).ready(function() {
				$('.datatable-1').dataTable();
				$('.dataTables_paginate').addClass("btn-group datatable-pagination");
				$('.dataTables_paginate > a').wrapInner('<span />');
				$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
				$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
			});
		</script>
	</body>
<?php } ?>