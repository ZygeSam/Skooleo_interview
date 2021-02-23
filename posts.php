<?php
session_start();
	require_once("./vendor/autoload.php");
	use App\Post;
	use App\Author;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Posts.Zyge Sam's Blog Post</title>
	<meta name="viewport" content="width=device-width, inital-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>
	
	<div class="container">
	<form action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
		<div class="form-group">
			<label for="email">Post title</label>
				<input type="text" name="title" class="form-control" id="title">
		</div>
		<div class="form-group">
			<label for="descr">Description</label>
			<textarea name="descr" id="descr" class="form-control" cols="30" rows="10"></textarea>
		</div>
		<div class="form-group">
			<label for="descr">Content</label>
			<textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
		</div>
		<div class="form-group">
			<button class="btn btn-warning" name="submit">Create</button>
		</div>
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
if(isset($_POST['submit']) || empty($_POST['title']) || empty($_POST['descr']) || empty($_POST['content'])){
	echo "<script>
			alert(\" Please fill up the form \");
		</script>
";
}
if(isset($_POST['submit']) && isset($_POST['title']) && isset($_POST['descr']) && isset($_POST['content'])){
	require_once('./vendor/autoload.php');
$post= new Post();
$post->add($_POST);



}

?>