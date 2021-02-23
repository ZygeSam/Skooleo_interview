<?php
	require_once("./vendor/autoload.php");
		use App\Author;
?>
<!DOCTYPE html>
<html>
<head>
	<title>SIGNUP.Zyge Sam's Blog Post</title>
	<meta name="viewport" content="width=device-width, inital-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>
	
	<div class="container">
	<form action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
		<div class="form-group">
			<label for="email">Email</label>
				<input type="email" name="email" class="form-control" id="email">
		</div>
		<div class="form-group">
			<label for="userName">Username</label>
			<input type="text" class="form-control" name="user" id="userName">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="pwd" id="password">
		</div>
				<div class="form-group">
			<button class="btn btn-warning" name="submit">REGISTER</button>
		</div>
	</form>
	</div>
</body>
<footer class="footer">
	<p class="text-center">
		Copyright &copy; Sakinbarnes Samuel Blog 2020 &reg;Skooleo&trade;
	</p>
</footer>
</html>
<?php
if(isset($_POST['submit']) || empty($_POST['email']) || empty($_POST['user']) || empty($_POST['pwd'])){
	echo "<script>
			alert(\" Please fill up the form \");
		</script>
";
}
if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['user']) && isset($_POST['pwd'])){
	require_once('./vendor/autoload.php');
$auth= new Author();
$auth->add($_POST);



}

?>