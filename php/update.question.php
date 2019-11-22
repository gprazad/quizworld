<?php 
include ("connect.db.php");
if(isset($_POST['updateQuest'])) {
$category=$_POST['category'];
$question=$_POST['question'];
$option[0]=$_POST['option1'];
$option[1]=$_POST['option2'];
$option[2]=$_POST['option3'];
$option[3]=$_POST['option4'];
$answer=$_POST['answer'];
$qid=$_POST['qid'];
$db = new dbc();
$qt = new quiz;
if($category!=null && $question!=null && $option!=null && $answer!=null) {
if($qt->updateQuest($category,$question,$option,$answer,$qid))
header('Location:../updateQuest.php?q=yes');
}
else {
	header('Location:../updateQuest.php?q=no');
}
}
else { echo "Not Added!"; }
?>