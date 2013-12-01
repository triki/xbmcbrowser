<?php
$db_handle = mysql_connect("127.0.0.1", "user", "password") or
die(mysql_error());
$db_found = mysql_select_db("MyVideos75") or die(mysql_error());
?>
