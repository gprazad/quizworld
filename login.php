<!DOCTYPE html>
<html>
<head>
<title>QUIZ WORLD</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
<script type="text/javascript" src="jquery.min.js"></script>

</head>
<body>

<div id="wrap">

<div id="header" role="banner">
<h1><a href="http://quizworld.co.nf/">QUIZ W<span class="fa fa-globe"></span>RLD</a> </h1>
<h2>Check your Knowledge</h2>
</div>

<div id="content">
<div class="left" role="main"> 

<fieldset id="login">
<legend>Authorised User</legend>
<?php
		if(isset($_GET['lerror'])) {
		$response=$_GET['lerror'];
		if($response=='failed')
		echo "<div class=\"alert alert-error\"><span class=\"fa fa-user-times\"></span> You are not authorised to login!</div>";
		}
?>
<form method="get" action="php/login.check.php">
<label for="username">Name</label><input type="text" name="username" required aria-required="true" autofocus>
<label for="password">Password</label><input type="password" name="password" required aria-required="true">
<input type="submit" name="login" value="LOGIN" id="loginButton">
</form>

</fieldset>

</div>
<div id="openModal" class="modalPopup">
<div>
<h2>Administrator Login</h2>
<a href="#close" title="Close" class="close">X</a>
<fieldset id="login">
<form method="get" action="php/login.check.php">
<label for="username">Name</label><input type="text" name="username" required aria-required="true" autofocus>
<label for="password">Password</label><input type="password" name="password" required aria-required="true">
<input type="submit" name="login" value="LOGIN">
</form>
</fieldset>
</div>
</div>


<div class="right" role="navigation"> 
<h2><span class="fa fa-bars"></span> Pages</h2>
<ul>
<li><a href="index.html">Home</a></li>
<li><a href="contact.html">Contact</a></li>
</ul>
<h2><span class="fa fa-folder-open"></span> Categories :</h2>
<ul>
<?php 
	include "php/connect.db.php";
	include "php/get.category.php";
	foreach($cat as $category)	{
			echo '<li><a href="quest.php?cat='.urlencode($category).'">'.$category.'</a></li>';
			}
?>
</ul>
<h2><span class="fa fa-bookmark"></span> External Links</h2>
<ul>
<li><a>Homepage</a></li>
</ul>
</div>
<div style="clear: both;"> </div>
</div>



<div id="footer" role="contentinfo"> Designed by <a href="http://gprazad.co.nr/">GPRAZAD</a>, Administrator <a href="login.php#openModal">Login</a> </div>
</div>
</body>
</html>