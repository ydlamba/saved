<?php 

namespace Saved\Models;

class Link{
	public static function DB(){
		return new \PDO("mysql:dbname=saved;host=localhost","guest","guest@123");
	}

	public static function add($link){
		$db = self::DB();
		$query = $db->prepare('INSERT INTO links (Link, Description) VALUES (:Link, :Description)');
		return $query->execute(
			['Link' => $link[0],
			'Description' => $link[1]]
			);
	}


}


?>