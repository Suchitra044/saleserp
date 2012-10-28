<?php
$c=mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("Sales",$c);
$n=$_SESSION['eid'];
$p=$_SESSION['pswd'];
echo "$n";
echo "$p";
?> 

