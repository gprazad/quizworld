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
		<h2><a href="http://quizworld.co.nf/"><div class="fa fa-plus"></div> Add Questions</a></h2>
		<?php
		if(isset($_GET['q'])) {
		$response=$_GET['q'];
		if($response=='yes')
		echo "<div class=\"alert alert-success\">Question Added Successfully!</div>";
		else if($response=='no')
		echo "<div class=\"alert alert-error\">Question cannot be Added!</div>";
		}
		?>
		<form name="addQuestion" method="post" action="php/add.question.php">
		<div class="question">
			<p>Category	:
			<select id="category" name="category">
			<?php
			include "php/connect.db.php";
			include "php/get.category.php";
			foreach($cat as $category)	{
			echo '<option value="'.$category.'">'.$category.'</option>';
			}
			?>
				</select></p>
			<p>Question: <input type="text" name="question" id="quest"><p>
			<p>Options : </p>
			<p><input type="text" id="option" name="option1"><input type="text" id="option" name="option2"></p>
			<p><input type="text" id="option" name="option3"><input type="text" id="option" name="option4"></p>
			</div>
			<div id="answer">
			<strong>Answer<input type="text" id="answer" name="answer"></strong> <input type="submit" value="Add" name="addQuest" id="button">
			</div>
		</form>	
	</div>

<div class="right"> 

<h2><span class="fa fa-gears"></span>  Settings</h2><ul>
<li><a href="addQuest.php">Add Question</a></li> 
<li><a href="viewQuest.php">View Questions</a></li>   
<li><a href="editQuest.php">Edit Questions</a></li>  
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