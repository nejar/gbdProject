<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

	$product_name = strip_tags($_POST['product_name']);
	$sku_number = strip_tags($_POST['sku_number']);
	$part_number = strip_tags($_POST['part_number']);
	$description = strip_tags($_POST['description']);
	$specification = strip_tags($_POST['specification']);

	// save to database

	$_SESSION['msg'] = 'Thank you!';
	header('Location: ../index.php');
}
