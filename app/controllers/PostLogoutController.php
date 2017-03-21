<?php 

namespace Saved\Controllers;
session_start();

use Saved\Models\Link;
use Saved\Models\User;

class PostLogoutController extends BaseController{


	public function get(){

		session_start();
		if(session_destroy()){
			header('location:/');
		}

	}

				

}






?>