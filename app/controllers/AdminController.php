<?php 

namespace Saved\Controllers;
session_start();

use Saved\Models\Link;
use Saved\Models\User;

class AdminController extends BaseController{

	public function get(){
		if(isset($_SESSION['flag']) && $_SESSION['login']['Username'] == 'admin'){

			$rows = User::show();
			$users = User::showusers();

			$this->render('admin.html',['rows' => $rows, 'login' => $_SESSION['login'], 'users' => $users]);

		}else{
			header("location:/profile");
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
			$users = User::showusers();

			$this->render('admin.html',['rows' => $rows, 'login' => $_SESSION['login'], 'users' => $users]);

	}

				

}






?>