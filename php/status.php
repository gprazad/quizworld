<?php 
include ("connect.db.php");
$db = new dbc("localhost","quiz","db","quiz");
$qt = new quiz;
$qt->checkStat();
$cat=$qt->getCategory();

?>