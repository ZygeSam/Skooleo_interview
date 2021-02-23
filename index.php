<?php
	require_once("./vendor/autoload.php");
	use App\Post;
	use App\Author;
	include('header.php');
?>


<div class="container text-center">
	<div class="row jumbotron tex-center">
		<div class="col-md-7 col-lg-7 card text-center">
			<p class="lead "><u>Posts</u></p>
			
			<?php
				$postss = new Post();
				$auth= new Author();
				$posts=$postss->index();
				//print_r($postss->index());
				foreach ($posts as $post => $p) {
				?>
				
			<blockquote class="blockquote-footer text-center">
				<p class="mb-0 h3"><a href=<?php echo("post_show.php?id=" . $p['id']); ?>><?php echo($p['title']);?> </p>
			</blockquote>
			<p class="h5"><?php echo($p['description']);?></a></p>
			<p class="small"><i>Opened:  <?php echo($p['view_count']);?> times</i></p>
			<p class="small"><i>Created:  <?php echo($p['created_at']);?></i></p>
			<?php
		}

		?>
	
		</div>
	</div>
	<?php
include('footer.php');
?>
</div>

