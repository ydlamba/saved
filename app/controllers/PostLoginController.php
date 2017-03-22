<?php 

namespace Saved\Controllers;

session_start();
use Saved\Models\User;

class PostLoginController extends BaseController{

	public function get(){
		if(isset($_SESSION['flag'])){

			$rows = User::show();
			$users = User::showusers();
			
			if($_SESSION['login']['Username'] == 'admin'){
				$this->render('admin.html',['rows' => $rows, 'login' => $_SESSION['login'], 'users' => $users]);
			}else{
				$this->render('profile.html',['rows' => $rows, 'login' => $_SESSION['login']]);
			}
		}else{
			header("location:/");
		}
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
			$users = User::showusers();

			$_SESSION['login'] = $login;
			$_SESSION['rows'] = $rows;
			$_SESSION['users'] = $users;


			if($login){
				if($login['Username'] == 'admin'){
					header('Location:http://saved.sdslabs.dev/admin');	
				}else{
					header('Location:http://saved.sdslabs.dev/profile');
				}
			}

				

	}

}






?>