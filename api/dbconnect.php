<?php
	@ $db = new mysqli('localhost', 'root', '', 'dg03_project');
	if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to the database. Please try again later.';
     exit;
	 
	}
?>