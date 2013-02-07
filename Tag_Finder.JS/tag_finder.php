<?php
$q_GET["q"];
$r_GET["r"];

// mysql connection

$connect = mysql_connect("localhost", "root","") or die(mysql_error());
mysql_select_db("movementshowto", $connect) or die (mysql_error());

// query the database, selects table a and finds tags (only tags for now; locations and subjects in the future)

$query= "SELECT Name,URL FROM howToTest WHERE Tag = '".$q."' and Topic = '".r."' ";

$result = mysql_query($query) or die(mysql_error());

$row = json_encode(mysql_fetch_assoc($result));

echo "queryResults(".$result.")";
  
?>
