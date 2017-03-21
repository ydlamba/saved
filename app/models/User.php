<?php 

namespace Saved\Models;

class User{
	public static function DB(){
		return new \PDO("mysql:dbname=saved;host=localhost","guest","guest@123");
	}

	public static function register($regiester_creds){
		$db = self::DB();
		$query = $db->prepare('INSERT INTO users (Name, Email, Username, Password) VALUES (:Name, :Email, :Username, :Password)');
		return $query->execute(
			['Name' => $regiester_creds[0],
			'Email' => $regiester_creds[1],
			'Username' => $regiester_creds[2],
			'Password' => $regiester_creds[3]]
			);
	}

	public static function login($login_creds){
		$db = self::DB();
		$query = $db->prepare('SELECT * FROM users WHERE Username = :Username AND Password = :Password');
		$result = $query->execute(
			['Username' => $login_creds[0],
			'Password' => $login_creds[1]]
			);

		if(!$result){
			print_r($query->errorInfo());
		}
		
		if($query->rowCount() == 1){
			$rows = $query->fetch(\PDO::FETCH_ASSOC);
			echo 'User id is'.$rows['UID'];
			session_start();
			$_SESSION['flag'] = 1;
			$_SESSION['UID'] = $rows['UID']; 
			return $rows;

		}else{
			echo "Invalid Username or Password";
		}

	}

	public static function show(){
		$db = self::DB();		
		$query = $db->prepare('SELECT * FROM links WHERE UID = :UID');
		$result = $query->execute(
			['UID' => $_SESSION['UID']]
			);
		if(!$result){
			print_r($query->errorInfo());
		}else{
			return $query->fetchAll();		
		}
	}	

}


?>