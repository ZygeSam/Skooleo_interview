<?php
	require_once("./vendor/autoload.php");
		use App\Author;
?>
<!DOCTYPE html>
<html>
<head>
	<title>SIGNIN.Zyge Sam's Blog Post</title>
	<meta name="viewport" content="width=device-width, inital-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>
	<div class="container">
	<form action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
		
		<div class="form-group">
			<label for="userName">Username</label>
			<input type="text" class="form-control" name="user" id="userName">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="pwd" id="userName">
		</div>
		<div class="form-group">
			<button name="submit" class="btn btn-success">LOGIN</button>
		</div>
	</form>
	</div>
</body>
<footer class="footer">
	<p class="text-center">
		Copyright &copy; Sam Zyge Blog 2020
	</p>
</footer>
</html>
<?php
if(isset($_POST['submit']) || empty($_POST['user']) || empty($_POST['pwd'])){
	echo "<script>
			alert(\" Please fill up the Login form \");
		</script>
";
}
if(isset($_POST['submit']) && isset($_POST['user']) && isset($_POST['pwd'])){
require_once('./vendor/autoload.php');
$auth= new Author();
$auth->login($_POST);
session_start();
$_SESSION['user'] = $_POST['user'];
}
?>