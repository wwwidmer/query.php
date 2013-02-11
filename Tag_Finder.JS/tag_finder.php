<?php
$q_GET["q"];
$r_GET["r"];

// mysql connection

function mysqlconnect(){

$host = "localhost";
$user = "root";
$pw = "";
$database = "movementshowto";

$connect = mysql_connect($host,$user,$pw) or die(mysql_error());
$query = mysql_select_db($database, $connect) or die (mysql_error());

return $query;
}


// query the database, selects table a and finds tags and topics

function query(){

$query= "SELECT Name,URL FROM howToTest WHERE Tag = '".$q."' and Topic = '".r."' ";

$result = mysql_query($query) or die(mysql_error());

while($row=mysql_fetch_array($result)){
	echo $row['Name']. "-". $row['URL'];
	echo "<br />";

return $result;

}


mysqlconnect();
$res = query();


$array=mysql_fetch_row($res);
echo json_encode($array);


}




  
?>

<html>
<body>
wdasdsad
</body>
</html>