<?php 

namespace Saved\Controllers;

session_start();
use Saved\Models\User;

class PostLoginController extends BaseController{

	public function get(){
		header("location:/");
	}
	public function post(){
		function test_input($data){
			$data = stripslashes($data);
			$data = trim($data);
			$data = htmlspecialchars($data);
			return $data;
		}

			$log_uname = test_input($_POST['log_uname']);
			$log_pass = test_input($_POST['log_pass']);
			$login_creds = [$log_uname,$log_pass];

			$login = User::login($login_creds); 
			$rows = User::show();

			$_SESSION['login'] = $login;
			$_SESSION['rows'] = $rows;

			if($login){
				header('Location:http://saved.sdslabs.dev/profile');
			}

				

	}

}






?>