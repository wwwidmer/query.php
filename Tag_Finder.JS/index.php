<? php

// mysql connection

$connect = mysql_connect("localhost, "user","password") or die(mysql_error());
mysql_select_db("databaseName", $connect) or die (mysql_error());

// query

$result = mysql_query("SELECT * FROM howTo WHERE ama='x' AND loc='y' AND need='z') or die(mysql_error());
$row = mysql_fetch($result);

// echo to make sure it works

echo .$row['Name']
echo .$row['URL']
echo .$row['Description']

?>
