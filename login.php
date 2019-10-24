<?php
require_once __DIR__ . "/bootstrap/init.php";

define(HASH_SALT, 'a1ea0acd-506c-4e18-8cf2-5fba5d5ef265');

if(isset($_SESSION['user'])) {
	header("Location: index.php");
	exit;
}

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['_LOGIN'])) {
	$username = strip_tags(stripslashes(htmlspecialchars(($_POST['username']))));
	$password = strip_tags(stripslashes(htmlspecialchars(($_POST['password']))));
	$hash_password = hash('sha256', $password . HASH_SALT);

	// query to fetch details form user table
	$sql = "SELECT * FROM `user` WHERE username = '$username' AND password = '$hash_password'";
	$query = $conn->query($sql);

	if($query->rowCount() == 1) {
		$_SESSION['user'] = $query->fetch();
		header("Location: index.php");
		exit;
	}

	$_SESSION['login_error'] = 'Invalid username or password';
} else {
	unset($_SESSION['login_error']);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
		<script src="assets/main.js"></script>
	</head>
	<body>

		<div class="wrapper fadeInDown container">
		  <div id="formContent">
		    <form id="login_form" method="post" action="">
		    	<div class="my-3 text-danger">
		    		<?php
						if(isset($_SESSION['login_error'])) {
							echo $_SESSION['login_error'];
						}
					?>
		    	</div>
		      <input type="text" id="login" class="fadeIn second" name="username" placeholder="username">
		      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
		      <input type="submit" class="fadeIn fourth btn btn-primary" name="_LOGIN" value="Log In">
		    </form>

		  </div>
		</div>

	</body>
</html>
