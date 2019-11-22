<?php
session_start();
if(!isset($_SESSION['admin']))	{
		echo "SESSION EXPIRED";
		header('Location:login.php');
	}
?>