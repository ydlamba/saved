<?php 

namespace Saved\Models;

class Link{
	public static function DB(){
		return new \PDO("mysql:dbname=saved;host=localhost","guest","guest@123");
	}

	public static function add($link){
		$db = self::DB();
		$query = $db->prepare('INSERT INTO links (UID, Link, Description) VALUES (:UID, :Link, :Description)');
		return $query->execute(
			['UID' => $_SESSION['UID'],
			'Link' => $link[0],
			'Description' => $link[1]]
			);
	}


}


?>