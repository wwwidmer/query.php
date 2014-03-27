<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<?php
// Begin timer
$tzero=microtime(true);
// Allow up to 60 seconds of computing, then exit.
set_time_limit(60);
// mysql connection attributes
$host = "localhost";
$user = "query";
$pw = " ";
$database = "movementshowto";
try{
	$db= new PDO('mysql:host=localhost;dbname=movementshowto;charset=utf8',$user,$pw);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
	echo 'ERROR: ' .$e->getMessage();
}
// All groups of information get their own table which displays subset topics within, max is 3
function getTable($case,$db){
	$q=$_GET['q'];$z=$_GET['z'];$y=$_GET['y'];$x=$_GET['x'];
	$arr = array($x,$y,$z);	
	echo formatTopic($case);
	foreach($arr as $val){
		if(!$val==""){getTopic($q, $val, $case,$db);}
	} 
	echo "</div>";
	
}
// Displaying of query results
function getTopic($iam, $t, $case,$db){
	echo formatTopic($t);
	// prepared statements to deter SQL injections
	try{
 		$stmt = $db->prepare('SELECT * FROM '.$case.' where Tag = :tag AND (Topic = :topic OR 2ndTopic = :topic) ORDER BY Name');
		$stmt->execute(array('topic'=>$t, 'tag'=>$iam));		
		$result=$stmt->fetchAll();	
		if(count($result)){	
			// Format results with links and meta tags for descriptions
 			foreach($result as $row){
				$str="<li><a href='".$row['URL']."' target='_blank'> <b><u>".$row['Name']."</u></b></a><br/>";
				echo $str;
				if($case=="indepthmaterials"){
					echo $row['Description'];
				}else{$meta = get_meta_tags($row['URL']);echo $meta['description'];}echo "</li>";
			}echo "<br/>";
		} else {echo "<li>Sorry, nothing found</li>";} 
	} catch(PDOException $e){
 		echo 'ERROR: ' . $e->getMessage();
	} echo "</ul>";
}
// Determine the proper heading for particular topics
function formatTopic($t){
switch($t){
	case "howtos":
		echo "<h2><u>How Tos</u></h2><div class='accordion'>";

	break;
	case "caseStudies":
		echo "<h2><u>Case Studies</u></h2><div class='accordion'>";

	break;
	case "indepthmaterials":
		echo "<h2><u>Indepth Materials</u></h2> <div class='accordion'>";

	break;
	case "canvasvideos":
		echo "<h2><u>Canvas Videos</u></h2><div class='accordion'>";

	break;
	case "planandstrategize":
		echo "<p><u>Plan and Strategize</p></u><ul>";
	break;
	case "buildawareness":
		echo "<p><u>Build awareness</p></u><ul>";
	break;
	case "staysafe":
		echo "<p><u>Stay safe</p></u><ul>";
	break;
	case "mobilize":
		echo "<p><u>Mobilize</p></u><ul>";
	break;
	case "accessinformation":
		echo "<p><u>Access blocked information</p></u><ul>";
	break;
	case "collaborate":
		echo "<p><u>Collaborate</p></u><ul>";
	break;
	case "fundraise":
		echo "<p><u>Fundraise</p></u><ul>";
	break;
	case "keepsupportersengaged":
		echo "<p><u>Keep supporters engaged</p></u><ul>";
	break;
	}
}
// Actual function calls
getTable("howtos",$db);
getTable("caseStudies",$db);
getTable("indepthmaterials",$db);
getTable("canvasvideos",$db);
// Timer end and display
$tone = microtime(true);
$ttotal=round($tone-$tzero, 1, PHP_ROUND_HALF_UP);
echo "<br/><p><i> Query completed in ".$ttotal." seconds.</i></p><br/>";
?>

</html>
