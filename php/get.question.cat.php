<?php
include ("connect.db.php");
$db = new dbc();
$qt = new quiz;
$cat=$_GET['cat'];
$cat=urldecode($cat);
$r=$qt->chkQuestCat($cat);
$qd=rand(1,$r);
$row=$qt->getQuestCat($qd,$cat);
echo ' <div class="left" aria-live="assertive" aria-atomic="true"> ';
		echo '<h2><a href="#">'.$cat.'</a></h2>';
		if($row)	{
		echo '<div class="question">
			'.$row[3].'
		</div>	
			<div id="answer">
		';
		$option=explode(',',$row[4]);
		for($i=0;$i<4;$i++) {
			
				echo 	'
						<button id="'.$i.'">'.$option[$i].'</button>
						<script>
						var b'.$i.' = document.getElementById("'.$i.'");';
				if($row[5]==$option[$i]) {
					echo 	'b'.$i.'.addEventListener("dblclick", function() { b'.$i.'.className="correct"; setTimeout(correct,1000); }, false);';		
				} else {
				echo	'b'.$i.'.addEventListener("dblclick", function() { b'.$i.'.className="wrong"; setTimeout(incorrect,1000); }, false);';		
				}
				echo '</script>';
		}
		
echo	'		
			</div>
			<br /><br />';
			}
			else 
			echo "<div class=\"alert alert-complete\"> No Questions available in this category</div>";
	
echo '	</div> ';
 ?>