<?php 
$db = new dbc("localhost","quiz","db","quiz");
$qt = new quiz;
$cat=$qt->getCategory();

?>