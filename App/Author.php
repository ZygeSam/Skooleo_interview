<?php

namespace App;
use PDO;
require_once("./vendor/autoload.php");
class Author extends Database
{
	public function index()
	{
		$stmt =$this->pdo->prepare("Select * from authors");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function list_one($id){
		$stmt = $this->pdo->prepare("Select * from authors where $id = :id");
		$stmt->bindValue(":id", $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	

	public function add($author){


		$stmt= $this->pdo->prepare("Select * from authors
									WHERE email = :email OR username= :user");
		$author['pwd']=password_hash($author['pwd'], PASSWORD_DEFAULT);
		$stmt->bindValue(":email", $author['email']);
		$stmt->bindValue(":user", $author['user']);
		if($stmt->execute()){
			if($stmt->rowcount()==1){
				echo "<script>
			alert(\" Username or Email already exists \");
		</script>";
			}
			else{
				$stmt = $this->pdo->prepare("Insert Into authors(email, username, password)
									Values(:email, :user, :pwd)");
				$author['pwd']=password_hash($author['pwd'], PASSWORD_DEFAULT);
		$stmt->bindValue(":email", $author['email']);
		$stmt->bindValue(":user", $author['user']);
		$stmt->bindValue(":pwd", $author['pwd']);
		$stmt->execute();
		echo "<script>
			alert(\" Registered Successfully \");
		</script>";
		header('location: signin.php');
		   }
			
		}
	}
		

	public function update($author){
		$stmt= $this->pdo->prepare("Update authors
									SET email= :email,
										username= :user,
										password=:pwd
									Where id= :id");
		$stmt->bindValue(":id", $author['id']);
		$stmt->bindValue(":name", $author['name']);
		$stmt->bindValue(":dob", $author['dob']);
		$stmt->bindValue(":bio", $author['bio']);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);	
	}

	public function delete($id){
		$stmt= $this->pdo->prepare("Delete from authors
									Where id= :id");
		$stmt->bindValue(':id', $id);
		return $stmt->execute();
	}

	public function login($author){
		$author['pwd'] = trim($author['pwd']);
		$stmt= $this->pdo->prepare("Select * from authors
									WHERE username= :user");

		$author['user'] = trim($author['user']);

		$stmt->bindValue(':user', $author['user']);

		if($stmt->execute()){
			if($stmt->rowcount()==1){
				if($row = $stmt->fetch()){
					$id= $row['id'];
					$user = $row['username'];
					$hash= $row['password'];
					if(password_verify($author['pwd'], $hash)){
						session_start();
						$_SESSION['loggedin']=true;
						$_SESSION["id"] = $id;
                        $_SESSION["user"] = $user;
                        header("location: auth_dashboard.php");
					}else{
						$error[]="Wrong password";
						echo "<script>
			alert(\"Wrong password  \");
		</script>";
				
			}
			}else{
				$error[]="Could not fetch";
				echo "<script>
			alert(\"Could not fetch  \");
		</script>";
				
			}
		}else{
				$error[]="No Account found with username";
				echo "<script>
			alert(\"No Account found with username \");
		</script>";
			}
		}else{
				$error[]="Oops something happened";
				echo "<script>
			alert(\"Oops something happened \");
		</script>";
			}
		}
		
		public function logout(){
			session_unset();
			session_destroy();
		}
	}
	?>