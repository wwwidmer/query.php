<? php

// mysql connection

$connect = mysql_connect("localhost", "user","password") or die(mysql_error());
mysql_select_db("test", $connect) or die (mysql_error());


$result = mysql_query("SELECT * FROM A WHERE Tag='x' AND Location='y') or die(mysql_error());
$row = mysql_fetch($result);

// echo to make sure it works

echo .$row['Tag']
echo .$row['URL']
echo .$row['Description']

?>
