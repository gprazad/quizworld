<?php
class dbc
{
	private $hostname;
	private $user;
	private $password;
	private $database;
	protected $connection;
	private $result;
	private $row_count;
	
	function __construct() {
		$host="fdb7.biz.nf";
		$user="root";
		$pass="1942";
		$dbname="1942808_quiz";
		$connection=mysql_connect($host,$user,$pass);
		if (!$connection) { 
			echo( '<p>Unable to connect to the ' .
				'database server at this time.</p>' );
			exit();
		}
		else {
			mysql_select_db($dbname, $connection);
		}
	
	}
	public function execute($query) {
	$result=mysql_query($query);
	}
	public function login($query) {
	$result=mysql_query($query);
	$row=mysql_num_rows($result);
	if($row>0) {
	return true;
	}
	else {
	return false;
	}
	}
	public function getDB() {
	$result="QUIZ";
	return $result;
	}
}

class quiz
{
	private $question;
	private $category;
	private $options;
	private $answer;
	private $query;
	private $result;
	
	public function addQuest($category,$question,$options,$answer) {
	$query1="SELECT count(cid) AS cat FROM quiz WHERE category='$category'";
	$result1=mysql_query($query1);
	$arra=mysql_fetch_row($result1);
	$cid=$arra['0'];
	$cid++;
	$y=0;
	$query2="SELECT qid FROM quiz WHERE answer='' LIMIT 1";
	$result=mysql_query($query2);
	if($qid=mysql_fetch_row($result))	{
		echo $qid[0];
		$query3="SELECT cid FROM quiz WHERE category='".$category."'";
		$result=mysql_query($query3);
		while($id=mysql_fetch_row($result))	{
			$x=$id[0];
			if($x!=($y+1))	{
			$cid=$y+1;
			break;
			}
			$y=$x;
		}
		$query4="UPDATE quiz SET cid='".$cid."',category='".$category."',question='".$question."',options='".$options[0].",".$options[1].",".$options[2].",".$options[3]."',answer='".$answer."' WHERE qid='".$qid[0]."'";
		$result=mysql_query($query4);
		return $result;
	}
	else	{
		$query3="INSERT INTO quiz VALUES('','".$cid."','".$category."','".$question."','".$options[0].",".$options[1].",".$options[2].",".$options[3]."','".$answer."')";
		$result=mysql_query($query3);
		return $result;
		}
	}
	public function updateQuest($category,$question,$options,$answer,$qid) {
	$query1="SELECT count(cid) AS cat FROM quiz WHERE category='$category'";
	$result1=mysql_query($query1);
	$arra=mysql_fetch_row($result1);
	$cid=$arra['0'];
	$cid++;
	$query="UPDATE quiz SET cid='".$cid."',category='".$category."',question='".$question."',options='".$options[0].",".$options[1].",".$options[2].",".$options[3]."',answer='".$answer."' WHERE qid='".$qid."'";
	$result=mysql_query($query);
	return $result;
	}
	public function removeQuest($question)	{
	$query="UPDATE quiz SET cid='1',category='',question='',options='',answer='' WHERE qid='".$question."'";
	$result=mysql_query($query);
	return $result;
	}
	public function addMessage($sender,$mail,$message)	{
	$query="INSERT INTO message VALUES('','','".$sender."','".$mail."','".$message."')";
	$result=mysql_query($query);
	return $result;
	}
	public function addCategory($category)	{
	$query="INSERT INTO category VALUES('','".$category."')";
	$result=mysql_query($query);
	return $result;
	}
	public function getCategory() {
	$query="SELECT * FROM category";
	$result=mysql_query($query);
	$i=0;
	while($array=mysql_fetch_row($result))	{
	$row[$i]=$array[1];
	$i++;
	}
	return $row;
	}
	public function getQuest($question) {
	$query="SELECT * FROM quiz WHERE qid='$question'";
	$result=mysql_query($query);
	$quest=mysql_fetch_array($result);
	return $quest;
	}
	public function getQuestCat($question,$category) {
	$query="SELECT * FROM quiz WHERE cid='$question' && category='$category'";
	$result=mysql_query($query);
	$quest=mysql_fetch_array($result);
	return $quest;
	}
	public function getQuestAll() {
	$query="SELECT * FROM quiz WHERE answer!=''";
	$result=mysql_query($query);
	return $result;
	}
	public function getQuestbyCat($category) {
	$query="SELECT * FROM quiz WHERE category='$category'";
	$result=mysql_query($query);
	
	return $result;
	}
	public function getQuestbyKey($keyword) {
	$query="SELECT * FROM quiz WHERE question like '%$keyword%' OR answer like '%$keyword%'";
	$result=mysql_query($query);
	
	return $result;
	}
	public function getQuestbyCatKey($category,$keyword) {
	$query="SELECT * FROM quiz WHERE question like '%$keyword%' OR answer like '%$keyword%' AND category='$category'";
	$result=mysql_query($query);
	
	return $result;
	}
	public function checkStat() {
	$q= new quiz;
	$total=$q->chkQuest();
	echo "<br/>Total Questions :".$total;
	$q->chkCat();
	}
	public function chkQuest() {
	$query="SELECT count(qid) FROM quiz";
	$result=mysql_query($query);
	$quest=mysql_fetch_array($result);
	return $quest[0];
	}
	public function chkQuestCat($category) {
	$query="SELECT count(cid) FROM quiz WHERE category='".$category."'";
	$result=mysql_query($query);
	$quest=mysql_fetch_array($result);
	return $quest[0];
	}
	public function chkCat() {
	$query="SELECT count(name) FROM category";
	$result=mysql_query($query);
	$quest=mysql_fetch_array($result);
	echo "<br/>Total Category :".$quest[0];
	$query="SELECT category, count( qid ) FROM quiz WHERE category!='' GROUP BY category";
	$result=mysql_query($query);
	while($quest=mysql_fetch_row($result)) {
	echo "<br/><strong>".$quest[0]."</strong> : ".$quest[1];
	}
	}
}
?>