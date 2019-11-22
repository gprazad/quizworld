<?php 
include ("connect.db.php");
include "get.category.php";
$_GET['edit']=1;
?>
<form method="get" action="editQuest.php">
<label for="searchkey">Keyword : </label><input type="text" name="searchkey" placeholder="Search">
&nbsp Category: 
<select id="category" name="category">
	<option value="">All</option>
	<?php
			
			foreach($cat as $category)	{
			echo '<option value="'.$category.'">'.$category.'</option>';
			}
			?>
</select>
<input type="submit" name="search" value="Find Question">

</form>

<?php

if(isset($_GET['search'])) {
if(isset($_GET['page']))	{
$page=$_GET['page'];
}
else {
$page=1;
}
$keyword=$_GET['searchkey']; 
$category=$_GET['category'];
$db = new dbc();
$qt = new quiz;
echo "<br/>";
if(!$keyword&&!$category)	{
	$result=$qt->getQuestAll($category);
	echo "All Questions";
}
else if(!$keyword&&$category)	{
	$result=$qt->getQuestbyCat($category);
		echo "Search All in Category <strong>".$category."</strong>";
}
else if(!$category&&$keyword)	{
	$result=$qt->getQuestbyKey($keyword);
		echo "Search for \"<em>".$keyword."</em>\" in All Category";
}
else if($category&&$keyword)	{
	$result=$qt->getQuestbyCatKey($category,$keyword);
		echo "Search for \"<em>".$keyword."</em>\" in Category <strong>".$category."</strong>";
}
$num=mysql_num_rows($result);
if($num==0) {
	echo "<br/>No Results Found!";
}
else {
$resnum=ceil($num/10);
echo '<table id="questions"><tr><th>No.</th><th>Questions</th><th>Answer</th><th>Option</th></tr>';
while($row=mysql_fetch_array($result)) {
$count++;
if($count>=($page*10)-9&&$count<=$page*10)
echo '<tr><td>'.$count.'</td><td>'.$row[3].'</td><td>'.$row[5].'</td><td><a class="fa fa-gear" href="updateQuest.php?qid='.$row[0].'"></a>  <a class="fa fa-trash" href="deleteQuest.php?qid='.$row[0].'"></a></td></tr>';

}

echo '</table><br/> ';

$pagecount=1;
echo '<div class="pagelist">Page :';				
while($pagecount<=$resnum)
{
echo '<a href="editQuest.php?searchkey='.$keyword.'&category='.$category.'&search=Find&page='.$pagecount;
if($page==$pagecount)
echo '" class="active">';
else
echo '">';
echo $pagecount.' </a></li>';
$pagecount++;

}
echo '</div>';
}

}
 ?>