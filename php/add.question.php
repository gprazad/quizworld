<?php 
include ("connect.db.php");
if(isset($_POST['addQuest'])) {
$category=$_POST['category'];
$question=$_POST['question'];
$option[0]=$_POST['option1'];
$option[1]=$_POST['option2'];
$option[2]=$_POST['option3'];
$option[3]=$_POST['option4'];
$answer=$_POST['answer'];
$db = new dbc();
$qt = new quiz;
if($category!=null && $question!=null && $option!=null && $answer!=null) {
if($qt->addQuest($category,$question,$option,$answer))
header('Location:../addQuest.php?q=yes');
}
else {
	header('Location:../addQuest.php?q=no');
}
}
else { echo "Not Added!"; }
?>