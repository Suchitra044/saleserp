<?php
$c=mysql_connect('a.db.shared.orchestra.io', 'user_d0d277c5', 'V$!Q7Z$F0J1h^d') or die(mysql_error());

mysql_select_db("db_d0d277c5",$c);
$query = "create table Users (name varchar(20),eid varchar(20) ,pswrd varchar(20))";


If ( mysql_query($query, $c))
   echo "mytable was created";
Else
   echo "error ";
mysql_close($c);

?>
