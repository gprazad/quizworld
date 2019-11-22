<?php
include ("connect.db.php");
$db = new dbc();
$qt = new quiz;
$r=$qt->chkQuest();
$qd=rand(1,$r);

$row=$qt->getQuest($qd);
$option=explode(',',$row[4]);
echo ' <div class="left" aria-live="assertive" aria-atomic="true"> 
		<h2><a href="#">'.$row[2].'</a></h2>
		<div class="question">
			'.$row[3].'
		</div>	
			<div id="answer">
		';
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
			
			<br /><br />
	</div> ';
 ?>