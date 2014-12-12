<?php
	$database = "pstem";
	$user = "pstem";
	$pass = "pstemDB";
	$host = "localhost";

	$db = new mysqli($host, $user, $pass, $database) or die("Unable to connect to database: ".$database);
?>