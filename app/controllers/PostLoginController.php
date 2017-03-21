<?php 

namespace Saved\Controllers;

use Saved\Models\User;

class PostLoginController extends BaseController{

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
			echo $login_creds[0]. $login_creds[1];

			$rows = User::login($login_creds); 
			//var_dump($rows);

			if($rows){
				//header("Location: http://saved.sdslabs.dev/login");
				echo "Logged In";
				$this->render('profile.html',['rows' => $rows]);
			}

				

	}

}






?>