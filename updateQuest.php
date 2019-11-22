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
		<h2><a href="http://quizworld.co.nf/"><div class="fa fa-upload"></div> Update Questions</a></h2>
		<?php
		if(isset($_GET['q'])) {
		$response=$_GET['q'];
		if($response=='yes')
		echo "<div class=\"alert alert-success \"><div class=\"fa fa-check\"></div> Question Updated Successfully!</div>";
		else if($response=='no')
		echo "<div class=\"alert alert-error \"><div class=\"fa fa-close\"></div> Question cannot be Updated!</div>";
		}
			include "php/connect.db.php";
			include ("php/get.category.php");
			if(isset($_GET['qid']))	{
			$qid=$_GET['qid'];
			$db = new dbc("localhost","root","","quiz");
			$qt = new quiz;
			$row=$qt->getQuest($qid);
			if($row) {
			$option=explode(',',$row[4]);
		?>
		<form name="addQuestion" method="post" action="php/update.question.php">
		<div class="question">
			<p>Category:
				
			<select id="category" name="category">
			<?php
			foreach($cat as $category)	{
			if($row[2]==$category)
			echo '<option value="'.$category.'" selected>'.$category.'</option>';
			else
			echo '<option value="'.$category.'">'.$category.'</option>';
			}
			?>
		
				</select></p>
			<input type="text" name="qid" value="<?php echo $row[0]; ?>" hidden>
			<p>Question:<input type="text" name="question" id="quest" value=" <?php echo $row[3]; ?>"><p>
			<p>Options :</p>
			<p><input type="text" id="option" name="option1" value="<?php echo $option[0]; ?>"><input type="text" id="option" name="option2" value="<?php echo $option[1]; ?>"></p>
			<p><input type="text" id="option" name="option3" value="<?php echo $option[2]; ?>"><input type="text" id="option" name="option4" value="<?php echo $option[3]; ?>"></p>
			</div>
			<div id="answer">
			<strong>Answer<input type="text" id="answer" name="answer" value="<?php echo $row[5]; ?>"></strong> <input type="submit" value="Update" name="updateQuest" id="button">
			</div>
		</form>	
		<?php
		}
		} ?>
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