<?php
if(isset($_GET['login']))	{
	$name = $_GET['username'];
	$password = $_GET['password'];
	include ("connect.db.php");
	$db = new dbc();
	$sql = "SELECT name,password FROM user WHERE name='$name' && password='$password';";
	$check	=	$db->login($sql);
	if($check) {
		session_start();
		$_SESSION['admin']=1;
		header('Location:../main.php');
		}
	else {
		header('Location:../login.php?lerror=failed');
	}
}
?>