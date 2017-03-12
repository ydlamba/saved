<?php 

//echo "this is public/index.php";
require_once __DIR__ . "/../vendor/autoload.php";

ToroHook::add('404', function(){
	echo '404';
	http_response_code(404); //set response code to 404
});

Toro::serve([
	'/' => Saved\Controllers\HomeController::class




	]);











?>	