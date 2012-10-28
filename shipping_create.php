<?php
$c=mysql_connect("a.db.shared.orchestra.io", "user_d0d277c5", "V$!Q7Z$F0J1h^d") or die(mysql_error());
mysql_select_db("db_d0d277c5",$c);
$query = "create table shippin (name varchar(20),age int,email varchar(20) ,phone int,st varchar(20),city varchar(20),state varchar(20))";


If ( mysql_query($query, $c))
   echo "mytable was created";
Else
   echo "error ";
mysql_close($c);

?>
