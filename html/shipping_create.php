<?php
$c=mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("Sales",$c);
$query = "create table shippin (name varchar(20),age int,email varchar(20) ,phone int,st varchar(20),city varchar(20),state varchar(20))";


If ( mysql_query($query, $c))
   echo "mytable was created";
Else
   echo "error ";
mysql_close($c);

?>
