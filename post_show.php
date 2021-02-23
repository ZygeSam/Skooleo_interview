<?php
	require_once("./vendor/autoload.php");
use App\Post;
$post = new Post();
$posts=$post->list_one($_GET['id']);
$count=$post->select_count($_GET['id']);
$count =$count+1;
$post->update_count($_GET['id'], $count);
include('header.php');
?>


<div class="container ">
	<div class="row jumbotron ">
		<div class="col-md-7 col-lg-7">
			<p class="lead "><u><?php echo($posts['title']);?></u></p>
			
			<p class="h5"><?php echo($posts['description']);?></a></p>
			<p class="h5"><?php echo($posts['content']);?></a></p>
			<p class="small"><i>Created:  <?php echo($posts['created_at']);?></i></p>
	
		</div>
	</div>
	<?php
include('footer.php');
?>
</div>


