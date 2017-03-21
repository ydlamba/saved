<?php 

namespace Saved\Controllers;
session_start();

class PostLogoutController extends BaseController{


	public function get(){

		session_start();
		if(session_destroy()){
			header('location:/');
		}

	}

}






?>