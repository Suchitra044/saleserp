<html>
<head>
<title>E-Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-5">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<div id="header">
		
	 
		
			
<a href="index_session.php">
			<font size=4 color=black>HOME </font></a>&nbsp;
		<a href="cart.php"><font size=4 color= black>SHOPPING CART </font></a>&nbsp;
                        <a href="index3.php"><font size=4 color=black>FAQ</font></a>
		
	</div>
	
	<div id="container" >
<font size="8" >SALES AND PURCHASE MANAGEMENT SYSTEM</font>																																			<div id="center" class="column">
	  	<br />
<marquee behavior="scroll" direction="left"><font size=6>upto 50% discount for selected products..<font></marquee>
	  	<div id="content">
			
			<img src="images/title3.gif" alt="" width="540" height="26" class="pad25" />
			<?php
$c=mysql_connect('a.db.shared.orchestra.io','user_d0d277c5','V$!Q7Z$F0J1h^d' ) or die(mysql_error());
mysql_select_db("db_d0d277c5",$c);
$result=mysql_query("INSERT INTO shippin(name,age,email,phone,st,city,state)VALUES ('$_POST[name]','$_POST[age]','$_POST[email]','$_POST[ph]','$_POST[st]','$_POST[city]','$_POST[state]')",$c);
if($result)
{
echo"u ve successfully ordered the product.. it will reach u shortly";
echo"<br/>";
echo "thanks for shopping with us";
}
else
{
echo"not successful try again";
}
?> 
</div>
</div>
<div id="left" class="column">
	  	<div class="block">
		<img src="images/title1.gif" alt="" width="168" height="42" /><br />
			<ul id="navigation">
				<li class="color"><a href="camera_session.php">camera</a></li>
			<li class="color"><a href="phone_session.php">mobile</a></li>
				<li class="color"><a href="lap_session.php">laptop</a></li>
				
				
			</ul>
		</div>

	  </div>
 <div id="right" class="column">
	
		<div class="rightblock" align="centre">
			<a href="logout.php"><font size="4" >Logout</font></a>
			<div class="blocks">
				<img src="images/top_bg.gif" alt="" width="218" height="12" />

	  </div>
</div>
</div>
	
	<div id="footer">
		<a href="index_session.php"> Back to Home</a>   
	</a>     </p>																																																																																																																																									
	</div>
</body>
</html>


