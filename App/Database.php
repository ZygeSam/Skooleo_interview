<?php
/**
 * 
 */
namespace App;
use PDO;

class Database 
{
	protected $pdo;
	
	 public function __construct()
	{
		try{
			$this->pdo = new PDO("mysql:server=localhost;dbname=skooleo", "root", "");
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e){
				echo("Connection failed");	
			}
	}

}
?>