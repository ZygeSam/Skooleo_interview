<?php
/**
 * 
 */
namespace App;
use PDO;
require_once("./vendor/autoload.php");
class Post extends Database
{
	public function index()
	{
		$stmt =$this->pdo->prepare("Select * from posts");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function list_one($id){
		$stmt = $this->pdo->prepare("Select * from posts where $id = :id");
		$stmt->bindValue(":id", $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function add($post){
		$stmt= $this->pdo->prepare("Select * from posts
									WHERE title = :title");
		$stmt->bindValue(":title", $post['title']);
		if($stmt->execute()){
			if($stmt->rowcount()==1){
				echo "<script>
			alert(\" Post title already exists \");
		</script>";
			}
			else{
				$stmt = $this->pdo->prepare("Insert Into posts(id, author_id, title, description, content)
									Values(null, :auth_id, :title, :descr, :content)");
		$stmt->bindValue(":auth_id", $_SESSION['id']);
		$stmt->bindValue(":title", $post['title']);
		$stmt->bindValue(":descr", $post['descr']);
		$stmt->bindValue(":content", $post['content']);
		$stmt->execute();
		echo "<script>
			alert(\" Post added Successfully \");
		</script>";
		header('location: posts.php');
		}
		
	}
}
	
	public function select_count($id){
		$stmt = $this->pdo->prepare("Select view_count from posts Where id= :id");
		$stmt->bindValue(":id", $id);
		return $stmt->execute();
	}
	public function update_count($id, $count){
		
		$stmt = $this->pdo->prepare("Update posts
									 Set view_count=$count
									 Where id= $id");
		$stmt->bindValue(":id", $id);
		$stmt->bindValue(":count", $count);
		$stmt->execute();
	}
}
?>