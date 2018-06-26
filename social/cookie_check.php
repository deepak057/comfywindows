<?php

 header("Access-Control-Allow-Origin: http://comfywindows.com");

@session_start();


if(empty($_SESSION)) {

	echo "false";

}

else {

	echo "true";

}


?>


