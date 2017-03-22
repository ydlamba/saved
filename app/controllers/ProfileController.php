<?php 

namespace Saved\Controllers;
session_start();

use Saved\Models\Link;
use Saved\Models\User;

class ProfileController extends BaseController{

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

			$link_name = test_input($_POST['link']);
			$link_desc = test_input($_POST['desc']);
			$link = [$link_name, $link_desc];

			Link::add($link);

			$rows = User::show();

			$this->render('profile.html',['rows' => $rows, 'login' => $_SESSION['login']]);

	}

				

}






?>