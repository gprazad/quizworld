<?php 
include ("connect.db.php");
$db = new dbc();
$qt = new quiz;
if(isset($_GET['qid']))	{
$id=$_GET['qid'];
if(isset($_GET['delete'])) {
$result=$qt->removeQuest($id);
if(!mysql_error())
echo"<div class=\"alert alert-complete\"><div class=\"fa fa-check\"></div> Removed the question from database.</div>";
else
echo"<div class=\"alert alert-error\"><div class=\"fa fa-close\"></div> Unable to remove the question.".mysql_error()."</div>";
}
else {
$row=$qt->getQuest($id);
if($row) {
$option=explode(',',$row[4]);
echo "<p>Are you sure you want to delete question.</p>";
echo "<p>".$row[3]."</p>";
echo "<p>Options : ";
for($i=0;$i<4;$i++)	{
if($row[5]==$option[$i]) {
echo "<strong>". $option[$i]."</strong>";
}
else	{
echo $option[$i];
}
if($i==3)
echo ". ";
else
echo ", ";
} ?>
<form action="" method="get">
<input type="text" value="<?php echo $id;?>" name="qid" hidden>
<input type="submit" name="delete" value="Delete">
</form>
<?php
}
}
}
 ?>