<?php 

namespace Saved\Controllers;
session_start();

use Saved\Models\User;

class HomeController extends BaseController{
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
			$this->render('index.html');
		}
	}
}


?>