<?php
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	if (isset($_POST['submit'])) {
		$skuId = $_POST['skuId'];
		$category = $_POST['category'];
		$subcat = $_POST['subcategory'];
		$productname = $_POST['productName'];
		$productcompany = $_POST['productCompany'];
		$productprice = $_POST['productprice'];
		$productpricebd = $_POST['productpricebd'];
		$size = $_POST['size'];
		$color = $_POST['color'];
		$producthighlight = $_POST['producthighlight'];
		$additionalInfo = $_POST['additionalInfo'];
		$refundandExchange = $_POST['refundandExchange'];
		$productdescription = $_POST['productDescription'];
		$productscharge = $_POST['productShippingcharge'];
		$productavailability = $_POST['productAvailability'];
		$productimage1 = $_FILES["productimage1"]["name"];
		$productimage2 = $_FILES["productimage2"]["name"];
		$productimage3 = $_FILES["productimage3"]["name"];
		//for getting product id
		$query = mysqli_query($con, "select max(id) as pid from products");
		//print_r($query);
		$result = mysqli_fetch_array($query);
		//print_r($result);
		$productid = $result['pid'] + 1;
		$dir = "productimages/$productid";
		if (!is_dir($dir)) {
			mkdir("productimages/" . $productid);
		}

		move_uploaded_file($_FILES["productimage1"]["tmp_name"], "productimages/$productid/" . $_FILES["productimage1"]["name"]);
		move_uploaded_file($_FILES["productimage2"]["tmp_name"], "productimages/$productid/" . $_FILES["productimage2"]["name"]);
		move_uploaded_file($_FILES["productimage3"]["tmp_name"], "productimages/$productid/" . $_FILES["productimage3"]["name"]);
		$sql = mysqli_query($con, "insert into products(skuId,category,subCategory,productName,productCompany,productPrice,size,color,productDescription,shippingCharge,productAvailability,productImage1,productImage2,productImage3,productPriceBeforeDiscount,producthighlight,additionalInfo,productrefundandExchange) values('$skuId','$category','$subcat','$productname','$productcompany','$productprice','" . implode(', ', array_values($size)) . "','" . implode(', ', array_values($color)) . "','$productdescription','$productscharge','$productavailability','$productimage1','$productimage2','$productimage3','$productpricebd','$producthighlight','$additionalInfo','$refundandExchange')");
		$_SESSION['msg'] = "Product Inserted Successfully !!";
	}


?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin| Insert Product</title>
		<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link type="text/css" href="css/theme.css" rel="stylesheet">
		<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
		<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">
			bkLib.onDomLoaded(nicEditors.allTextAreas);
		</script>

		<script>
			function getSubcat(val) {
				$.ajax({
					type: "POST",
					url: "get_subcat.php",
					data: 'cat_id=' + val,
					success: function(data) {
						$("#subcategory").html(data);
					}
				});
			}

			function selectCountry(val) {
				$("#search-box").val(val);
				$("#suggesstion-box").hide();
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
									<h3>Insert Product</h3>
								</div>
								<div class="module-body">

									<?php if (isset($_POST['submit'])) { ?>
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
										</div>
									<?php } ?>


									<?php if (isset($_GET['del'])) { ?>
										<div class="alert alert-error">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
										</div>
									<?php } ?>

									<br />

									<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

										<div class="control-group">
											<label class="control-label" for="basicinput">SKU-ID</label>
											<div class="controls">
												<input type="text" name="skuId" placeholder="Enter Product SKU ID" class="span8 tip" required>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">Category</label>
											<div class="controls">
												<select name="category" class="span8 tip" onChange="getSubcat(this.value);" required>
													<option value="">Select Category</option>
													<?php $query = mysqli_query($con, "select * from category");
													while ($row = mysqli_fetch_array($query)) { ?>

														<option value="<?php echo $row['id']; ?>"><?php echo $row['categoryName']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">Sub Category</label>
											<div class="controls">
												<select name="subcategory" id="subcategory" class="span8 tip" required>
												</select>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">Product Name</label>
											<div class="controls">
												<input type="text" name="productName" placeholder="Enter Product Name" class="span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Product Company</label>
											<div class="controls">
												<input type="text" name="productCompany" placeholder="Enter Product Comapny Name" class="span8 tip" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Product Price Before Discount</label>
											<div class="controls">
												<input type="text" name="productpricebd" placeholder="Enter Product Price" class="span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Product Price After Discount(Selling Price)</label>
											<div class="controls">
												<input type="text" name="productprice" placeholder="Enter Product Price" class="span8 tip" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Size</label>
											<div class="controls">
												<input type="text" name="size[]" placeholder="Enter Product Size" class="span8 tip">
												<button type="button" class="btn btn-success btn-lg" style="margin-top: 0px;" name="button" onclick="appendSize(this)">
													<i class="fa fa-plus"></i>
												</button>
											</div>
											<div class="controls" id="size_area">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Color</label>
											<div class="controls">
												<input type="text" name="color[]" placeholder="Enter Product Color" class="span8 tip">
												<button type="button" class="btn btn-success btn-lg" style="margin-top: 0px;" name="button" onclick="appendColor(this)">
													<i class="fa fa-plus"></i>
												</button>
											</div>
											<div class="controls" id="color_area">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Product Description</label>
											<div class="controls">
												<textarea name="productDescription" placeholder="Enter Product Description" rows="6" class="span8 tip"></textarea>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Product Highlight</label>
											<div class="controls">
												<textarea name="producthighlight" placeholder="Enter Product Highlight" rows="6" class="span8 tip"></textarea>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Additional Info</label>
											<div class="controls">
												<textarea name="additionalInfo" placeholder="Enter Product Additional Info" rows="6" class="span8 tip"></textarea>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Refund and Exchange Policy</label>
											<div class="controls">
												<textarea name="refundandExchange" placeholder="Enter Product Refund Exchange" rows="6" class="span8 tip"></textarea>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Product Shipping Charge</label>
											<div class="controls">
												<input type="text" name="productShippingcharge" placeholder="Enter Product Shipping Charge" class="span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Product Availability</label>
											<div class="controls">
												<select name="productAvailability" id="productAvailability" class="span8 tip" required>
													<option value="">Select</option>
													<option value="In Stock">In Stock</option>
													<option value="Out of Stock">Out of Stock</option>
												</select>
											</div>
										</div>



										<div class="control-group">
											<label class="control-label" for="basicinput">Product Image1</label>
											<div class="controls">
												<input type="file" name="productimage1" id="productimage1" value="" class="span8 tip" required>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">Product Image2</label>
											<div class="controls">
												<input type="file" name="productimage2" class="span8 tip" required>
											</div>
										</div>



										<div class="control-group">
											<label class="control-label" for="basicinput">Product Image3</label>
											<div class="controls">
												<input type="file" name="productimage3" class="span8 tip">
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Insert</button>
											</div>
										</div>
									</form>
								</div>
							</div>





						</div><!--/.content-->
					</div><!--/.span9-->
				</div>
			</div><!--/.container-->
		</div><!--/.wrapper-->


		<div id="blank_size_field" style="display: none;">
			<div class="flex-grow-1 pr-3">
				<div class="form-group">
					<input type="text" class="span8 tip" name="size[]" id="size" placeholder="Enter Product Size" />
					<button type="button" class="btn btn-danger btn-lg" style="margin-top: 0px;" name="button" onclick="removeSize(this)">
						<i class="fa fa-minus"></i>
					</button>
				</div>
			</div>
		</div>
		<div id="blank_color_field" style="display: none;">
			<div class="flex-grow-1 pr-3">
				<div class="form-group">
					<input type="text" class="span8 tip" name="color[]" id="color" placeholder="Enter Product Color" />
					<button type="button" class="btn btn-danger btn-lg" style="margin-top: 0px;" name="button" onclick="removeColor(this)">
						<i class="fa fa-minus"></i>
					</button>
				</div>
			</div>
		</div>


		<script>
			function appendSize() {
				var blank_requirement = $('#blank_size_field').html();
				$('#size_area').append(blank_requirement);
			}

			function removeSize(sizeElem) {
				$(sizeElem).parent().parent().remove();
			}


			function appendColor() {
				var blank_requirement = $('#blank_color_field').html();
				$('#color_area').append(blank_requirement);
			}

			function removeColor(sizeElem) {
				$(sizeElem).parent().parent().remove();
			}
		</script>

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