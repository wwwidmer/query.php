<?php $q=$_GET['q'];
$ra=get_meta_tags($q);
echo $ra['description'];
?>
