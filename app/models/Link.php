<?php 

namespace Saved\Models;

class Link{
	public static function DB(){
		global $CONFIG;
		return new \PDO("mysql:dbname={$CONFIG['dbname']};host={$CONFIG['dbhost']}",$CONFIG['dbuser'],$CONFIG['dbpass']);
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
	public static function delete($LID){
		$db = self::DB();
		$query = $db->prepare('DELETE FROM links WHERE LID = :LID');
		$result = $query->execute(
			['LID' => $LID]
			);
	}


}


?>