<?php include("php/session.check.php"); 
?>
<!DOCTYPE html>
<html>
<head>
<title>Administrator - QUIZ WORLD</title><meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
<script type="text/javascript" src="jquery.min.js"></script>

</head>

<body>
<script type="text/javascript">

</script>

<div id="wrap">

<div id="header">
<h1><a href="http://quizworld.co.nf/">QUIZ W<span class="fa fa-globe"></span>RLD</a> </h1>
<h2>Check your Knowledge</h2>
</div>

<div id="intro"> 
ADMINISTRATOR Panel
</div>
<div id="content">
	<div class="left"> 
		<h2><a href="http://quizworld.co.nf/"><div class="fa fa-edit"></div> Edit Questions</a></h2>
		<?php 
		include "php/edit.question.php";
		?>
	</div>
<div class="right"> 

<h2><span class="fa fa-gears"></span>  Settings</h2><ul>
<li><a href="addQuest.php">Add Question</a></li> 
<li><a href="viewQuest.php">View Questions</a></li>  
<li><a href="editQuest.php">Edit/Delete Questions</a></li>  
<li><a href="main.php">Stats</a></li>
</ul>

<h2><span class="fa fa-folder-open"></span>  Categories</h2>
<ul>
<?php 

	foreach($cat as $category)	{
			echo '<li><a href="">'.$category.'</a></li>';
			}
?>
</ul>

</div>
<div style="clear: both;"> </div>
</div>

<div id="footer">
Designed by <a href="http://gprazad.co.nr/">GPRAZAD</a>, Administrator <a href="php/session.logout.php">Log Out</a>
</div>
</div>

</body>
</html>