<?php
session_start();
$c=mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("Sales",$c);
$n=$_POST['eid'];
$p=$_POST['pswrd'];
$query = "SELECT * FROM Users WHERE eid='$_POST[eid]' AND pswrd='$_POST[pswrd]'"; 
	 
$result = mysql_query($query,$c);
if(!$result)
{
die('invalid query: '.mysql_error());
}
/*if(!result)
{
echo"query not executed";
}
else
{
echo"query executed";
}*/
if( mysql_num_rows($result) != 0 )
{
$_SESSION['eid'] = "$n";
 $_SESSION['pswd'] = "$pswrd";
 header('Location: index_session.php');
 }
 else{
header('Location: error.php');
}
?>