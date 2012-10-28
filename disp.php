<?php
$c=mysql_connect("a.db.shared.orchestra.io", "user_d0d277c5", "V$!Q7Z$F0J1h^d") or die(mysql_error());
mysql_select_db("db_d0d277c5",$c);
$n=$_POST['eid'];
$p=$_POST['pswrd'];
$query = "SELECT * FROM Users WHERE eid='$n' AND pswrd='$p'"; 
	 
$result = mysql_query($query,$c).mysql_error();


$row = mysql_fetch_array($result).mysql_error();
echo $row['name']."<br/>".$row['eid']."<br/>".$row['pswrd'];
mysql_close($c);
?>