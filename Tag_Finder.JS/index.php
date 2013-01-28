<?php
$q_GET["q"];
// mysql connection


// current dilemma : need to find where my test mysql "server" is located

$connect = mysql_connect("localhost", "ODBC","password") or die(mysql_error());
mysql_select_db("test", $connect) or die (mysql_error());

// query the database, selects table a and finds tags (only tags for now; locations and subjects in the future)

$result = mysql_query("SELECT * FROM a WHERE Tag=$q") or die(mysql_error());
$row = mysql_fetch($result);

// echo to make sure it works

echo .$row['Tag']
echo .$row['URL']
echo .$row['Description']

?>
