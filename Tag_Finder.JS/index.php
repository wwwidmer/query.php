<?php
$q_GET["q"];
// mysql connection


// current dilemma : need to find where my test mysql "server" is located

$connect = mysql_connect("localhost", "ODBC","password") or die(mysql_error());
mysql_select_db("test", $connect) or die (mysql_error());


$result = mysql_query("SELECT * FROM A WHERE Tag=$q") or die(mysql_error());
$row = mysql_fetch($result);

// echo to make sure it works

echo .$row['Tag']
echo .$row['URL']
echo .$row['Description']

?>
