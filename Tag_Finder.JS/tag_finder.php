<?php


$q=$_GET['q'];
$r=$_GET['r'];

// mysql connection

$host = "localhost";
$user = "root";
$pw = "";
$database = "movementshowto";

$connect = mysql_connect($host,$user,$pw) or die(mysql_error());
$query = mysql_select_db($database, $connect) or die (mysql_error());

// query the database, selects table a and finds tags and topics


$query= "SELECT Name,URL FROM howToTest WHERE Tag = '".$q."' and Topic = '".$r."' ";

$result = mysql_query($query) or die(mysql_error());


$data = array();
while ( $row = mysql_fetch_row($result) )
{
    $data[] = $row;
}

echo json_encode($data);

  
?>




  
?>

