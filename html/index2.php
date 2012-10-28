<html>
<head>
<title>E-Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-5">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<div id="header">
		
	 
		
			
<a href="index.html">
			<font size=4 color=black>HOME </font></a>&nbsp;
		<a href="index2.php"><font size=4 color= black>SHOPPING CART </font></a>&nbsp;
                        <a href="index3.html"><font size=4 color=black>FAQ</font></a>
		
	</div>
	
<?php
session_start();
function writeShoppingCart() {
$cart = $_SESSION['cart'];
if (!$cart) {
return '<p><font size="4" color="blue">You have no items in your shopping cart</font></p>';
} else {
// Parse the cart session variable
$items = explode(',',$cart);
$s = (count($items) > 1) ? 's':'';
return '<p>You have <a href="cart.php">'.count($items).' item'.$s.' in your shopping cart</a></p>';
}
}
echo writeShoppingCart();
?>
<div id="left" class="column">
	  	<div class="block">
		<img src="images/title1.gif" alt="" width="168" height="42" /><br />
			<ul id="navigation">
				<li class="color"><a href="camera.html">camera</a></li>
			<li class="color"><a href="phone.html">mobile</a></li>
				<li class="color"><a href="lap.html">laptop</a></li>
				
				
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
