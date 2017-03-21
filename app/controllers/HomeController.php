<?php 

namespace Saved\Controllers;

class HomeController extends BaseController{
	public function get(){
		//echo "this is get() in HomeController.php";
		$this->render('index.html');
	}
}


?>