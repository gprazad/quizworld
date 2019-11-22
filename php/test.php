<?php
include ("connect.db.php");
$db = new dbc();
$query="SELECT count(cid) AS cat FROM quiz WHERE category='Science & Technology'";
	$result=mysql_query($query);
	if($result)
	$arra=mysql_fetch_row($result);
	$cid=$arra['0'];
	$cid++;
	echo $cid;
	?>