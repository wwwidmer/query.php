<?php
$q_GET["q"];
$r_GET["r"];
// mysql connection

$connect = mysql_connect("localhost", "ODBC","password") or die(mysql_error());
mysql_select_db("test", $connect) or die (mysql_error());

// query the database, selects table a and finds tags (only tags for now; locations and subjects in the future)

$result = mysql_query("SELECT * FROM a WHERE Tag=$q") or die(mysql_error());

// row is the array to send back to the page, which will render it as a list.
$storeArray = Array();
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo $row['URL'];
    $storeArray[] =  $row['URL'];  
}


  
?>
