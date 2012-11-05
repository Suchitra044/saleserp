<?php
// Include MySQL class
require_once('mysql.class.php');
// Include database connection
require_once('global.inc.php');
// Include functions
require_once('functions.inc.php');
// Start the session
session_start();
// Process actions
$cart = $_SESSION['cart'];
$action = $_GET['action'];


switch ($action)
 {
	case 'add':
		if ($cart) {
			$cart .= ','.$_GET['id'];
		} 
else
 {
			$cart = $_GET['id'];
		}
		break;
	case 'delete':
		if ($cart)
 {
			$items = explode(',',$cart);
			$newcart = '';
			foreach ($items as $item) 
{
				if ($_GET['id'] != $item) 
{
					if ($newcart != '') 
{
						$newcart .= ','.$item;
					} 
else {
						$newcart = $item;
					}
				}
			}
			$cart = $newcart;
		}
		break;
	case 'update':
	if ($cart)
 {
		$newcart = '';
		foreach ($_POST as $key=>$value) 
{
			if (stristr($key,'qty')) 
{
				$id = str_replace('qty','',$key);
				$items = ($newcart != '') ? explode(',',$newcart) : explode(',',$cart);
				$newcart = '';
				foreach ($items as $item) 
{
					if ($id != $item) 
{
						if ($newcart != '') 
{
							$newcart .= ','.$item;
						} else 
{
							$newcart = $item;
						}
					}
				}
				for ($i=1;$i<=$value;$i++) {
					if ($newcart != '') {
						$newcart .= ','.$id;
					} else {
						$newcart = $id;
					}
				}
			}
		}
	}
	$cart = $newcart;
	break;
}
$_SESSION['cart'] = $cart;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>PHP Shopping Cart Demo &#0183; Cart</title>
	<link rel="stylesheet" href="css/styles.css" />
</head>

<body>

<div align="center">

<h1>Your Shopping Cart</h1>

<?php
echo writeShoppingCart();
?>

</div>

<div id="contents">

<h1>Please check quantities...</h1>

<?php
echo showCart();
?>

<p><a href="index_session.php">continue shopping...</a></p>&nbsp;&nbsp;&nbsp;&nbsp;
<p><a href="checkout.html">chechout...</a></p>
</div>



</body>
</html>