<?php 

namespace Saved\Controllers;

use Saved\Models\User;

class PostRegisterController extends BaseController{

	public function post(){
		function test_input($data){
			$data = stripslashes($data);
			$data = trim($data);
			$data = htmlspecialchars($data);
			return $data;
		}

			$name = test_input($_POST['name']);
			$email = test_input($_POST['email']);
			$uname = test_input($_POST['uname']);
			$pass = test_input($_POST['pass']);	
			$phash = password_hash($pass, PASSWORD_DEFAULT);

			$register_creds = [$name, $email, $uname, $phash];
			echo $register_creds[0], $register_creds[1], $register_creds[2], $register_creds[3];

			if(User::register($register_creds)){
				header("Location:/");
			}else{
				echo "Error";
			}		

	}

}






?>