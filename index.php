<?php

require_once __DIR__ . '/bootstrap/init.php';

if(!isset($_SESSION['user'])) {
	header("Location: login.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
		<script src="assets/main.js"></script>
	</head>
	<body>
	<div class="container my-5">
		<a class="btn btn-danger" href="logout.php">Logout</a>
	</div>
	

<?php
	if(isset($_SESSION['msg'])) { ?>

	<div class="jumbotron container">
		<h3><?php echo $_SESSION['msg']; ?></h3>
	</div>
	<?php
		unset($_SESSION['msg']);
		}
	?>


		<div class="container">
		  <form id="product" method="post" action="process/product.php" enctype="multipart/form-data" >
		    <div class="form-group">
		      <label for="product_name">Product Name:</label>
		      <input type="text" class="form-control" id="product_name" placeholder="Enter Product Name" name="product_name">
		    </div>    
		    <div class="form-group">
		      <label for="sku_number">SKU Number:</label>
		      <input type="text" class="form-control" id="sku_number" placeholder="Enter SKU Number" name="sku_number">
		    </div>   
		    <div class="form-group">
		      <label for="part_number">Part Number:</label>
		      <input type="text" class="form-control" id="part_number" placeholder="Enter Part Number" name="part_number">
		    </div>
		       <div class="custom-file form-group mb-3">
		      <input type="file" class="custom-file-input" id="customFile" name="upload_image">
		      <label class="custom-file-label" for="customFile">upload image</label>
		    </div>
		    <div class="form-group">
			  <label for="description">Description:</label>
			  <textarea class="form-control" name="description" rows="5" id="description"></textarea>
			</div>    
			<div class="form-group">
			  <label for="specification">Specification:</label>
			  <textarea class="form-control" name="specification" rows="5" id="specification"></textarea>
			</div>
		    <button type="submit" id="form-submit" name="submit" class="btn btn-success">Submit</button>
		  </form>
		</div>

	</body>
</html>
