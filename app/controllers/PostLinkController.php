<?php 

namespace Saved\Controllers;

use Saved\Models\Link;

class PostLinkController extends BaseController{

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
			echo $link[0]. $link[1];

			if(Link::add($link)){
				echo "link added !";
			}

	}

}






?>