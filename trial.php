<?php
$c=mysql_connect('a.db.shared.orchestra.io', 'user_d0d277c5', 'V$!Q7Z$F0J1h^d') or die(mysql_error());
mysql_select_db("db_d0d277c5",$c);
$query = "SELECT name,eid FROM Users WHERE eid='$_POST[eid]' AND pswrd='$_POST[pswrds]'"; 
	 
$result = mysql_query($query,$c).mysql_error();

if (!$result) {
    echo 'Could not run query: ';
    exit;
}
$row = mysql_fetch_row($result);

echo $row[0];
echo $row[1];
mysql_close($c);
?>