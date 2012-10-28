<?php
$c=mysql_connect('a.db.shared.orchestra.io', 'user_d0d277c5', 'V$!Q7Z$F0J1h^d') or die(mysql_error());
mysql_select_db("db_d0d277c5",$c);
$result=mysql_query("INSERT INTO product(name,pid ,detail,price)VALUES ('$_POST[name]','$_POST[pid]','$_POST[p1]','$_POST[p2]')",$c);
if($result)
{
echo"inserted";
}
else
{
echo" not inserted".mysql_error();
}
?> 

