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
<script type="text/javascript">
window.onload = function () {
	var points = localStorage.points;
	if(!points)
	localStorage.points=0;
	setTimeout(reload,60000);
};

function reload() {
	location.reload();
}
function correct() {
	var points = localStorage.points; // Query a stored value.
	points = localStorage["points"]; // Array notation equivalent
	if (points==null) {
		points=0;
	} else {
		points++;
	}
	localStorage.points = points;
	location.reload();
}
function incorrect() {
	var points = localStorage.points;
	if(points==null)
	localStorage.points=0;
	var result = confirm("Your Total Score : "+points+" points. Try Next TIME!");
	if(result)	{ 
		localStorage.points = 0; 
		location.replace("contact.html");
	else {
		localStorage.points = 0;
		location.replace("index.html");
	}
}
</script>

<div id="wrap">

<div id="header">
<h1><a href="http://quizworld.co.nf/">QUIZ W<span class="fa fa-globe"></span>RLD</a> </h1>
<h2>Check your Knowledge</h2>
</div>

<div id="intro"> <a href="http://quizworld.co.nf/">QUIZ</a>.
You Score <strong> <script type="text/javascript"> document.write(localStorage.points);</script></strong> points.<em>(Double click to select answer.)</em>	 </div>

<div id="content">
	<?php
	
	if(isset($_GET['cat'])) {
	include "php/get.question.cat.php";
	}
	else {
	include "php/get.question.php"; 
	}
	?>

<div class="right"> 
<h2><span class="fa fa-bars"></span> Pages</h2>
<ul>
<li><a href="index.html">Home</a></li>
<li><a href="contact.html">Contact</a></li>
</ul>
<h2><span class="fa fa-folder-open"></span> Categories</h2>
<ul>
<?php 
	include "php/get.category.php";
	foreach($cat as $category)	{
			echo '<li><a href="quest.php?cat='.urlencode($category).'">'.$category.'</a></li>';
			}
?>
</ul>
<h2><span class="fa fa-bookmark"></span> External Links</h2>
<ul>
<li><a href="http://gprazad.blogspot.com/">GPRAZAD Blog</a></li>
</ul>
</div>
<div style="clear: both;"> </div>
</div>


<div id="footer">
Designed by <a href="http://gprazad.co.nr/">GPRAZAD</a>, Administrator <a href="login.php#openModal">Login</a>
</div>

</body>
</html>