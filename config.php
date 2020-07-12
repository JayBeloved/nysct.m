<?php
	// This file contains the DB connection script. It will be included in files where DB operations are needed
	session_start();
	$connection = new mysqli('nysctm.test','root','nysctm2020','nysc_db');
	if ($connection->connect_error) {
		die('connection failed :' .$connection->connect_error);
	}

?>