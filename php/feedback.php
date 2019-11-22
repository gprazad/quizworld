<?php 
include ("connect.db.php");
if(isset($_POST['send'])) {
$sender = $_POST['name'];
$sender_mail = $_POST['email'];
$sent_message = $_POST['message'];
$sent_message = strip_tags($sent_message,"<br/><p><b><strong><em><i>");
$db = new dbc();
$qt = new quiz;
$message = "Thank you for the feedback message you left at quizworld.co.nf. We will contact you at this email id.";
$subject = "QUIZWORLD : Thank you for Feedback";
$header = "From: QUIZ WORLD \r\nReply-To:".$sender_mail."\r\n";
if(mail($sender_mail,$subject,$message,$header))	{
	 $msg=$qt->addMessage($sender,$sender_mail,$sent_message);
}
else	{
 echo "Unable to send the message";
}
}
?>