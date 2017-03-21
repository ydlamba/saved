<?php 

namespace Saved\Controllers;
session_start();

use Saved\Models\Link;
use Saved\Models\User;

class DeleteController extends BaseController{

	public function get(){
		if(isset($_SESSION['flag'])){
			$this->render('profile.html',['rows' => $_SESSION['rows'], 'login' => $_SESSION['login']]);
		}else{
			echo 'First Login !';
		}
	}
	public function post(){

			$LID = $_POST['todelete'];
			Link::delete($LID);

			$rows = User::show();
			$this->render('profile.html',['rows' => $rows, 'login' => $_SESSION['login']]);

	}

				

}






?>