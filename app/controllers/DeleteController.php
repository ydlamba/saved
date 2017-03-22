<?php 

namespace Saved\Controllers;
session_start();

use Saved\Models\Link;
use Saved\Models\User;

class DeleteController extends BaseController{

	public function get(){
		if(isset($_SESSION['flag'])){

			$rows = User::show();
			$users = User::showusers();

			if($_SESSION['login']['Username'] == 'admin'){
				$this->render('admin.html',['rows' => $rows, 'login' => $_SESSION['login'], 'users' => $users]);
			}else{
				$this->render('profile.html',['rows' => $_SESSION['rows'], 'login' => $_SESSION['login']]);
			}

		}else{
			header("location:/");
		}
	}

	public function post(){

			Link::delete($_POST['deleteLink']);	
			User::delete($_POST['deleteUser']);

			$rows = User::show();
			$users = User::showusers();

			if($_SESSION['login']['Username'] == 'admin'){
				$this->render('admin.html',['rows' => $rows, 'login' => $_SESSION['login'], 'users' => $users]);
			}else{
				$this->render('profile.html',['rows' => $_SESSION['rows'], 'login' => $_SESSION['login']]);
			}

	}

				

}






?>