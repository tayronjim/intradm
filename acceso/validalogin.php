<?php
	session_start(); 
	if (! isset($_SESSION['login'])) {
		header('Location: login.php');
	}
	else{
		print_r($_SESSION['login']); 
		header('Location: menu.php');
		//unset($_SESSION['login']);
	}  
?>