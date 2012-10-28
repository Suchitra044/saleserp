<?php
// Include MySQL class
//require_once('mysql.class.php');

// Include database connection
//require_once('global.inc.php');
// Include functions
//require_once('functions.inc.php');
function writeShoppingCart() {
	$cart = $_SESSION['cart'];
	if (!$cart) {
		return '<p>You have no items in your shopping cart</p>';
	} else {
		// Parse the cart session variable
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		return '<p>You have <a href="cart.php">'.count($items).' item'.$s.' in your shopping cart</a></p>';
	}
}

function showCart() {
	global $db;
$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="cart.php?action=update" method="post" id="cart">';
		$output[] = '<table>';
		foreach ($contents as $id=>$qty) {
			$sql = 'SELECT * FROM Product WHERE pid = '.$id;
			$result = $db->query($sql);
//$result=mysql_query($query, $c);
			$row = $result->fetch();
			extract($row);
			$output[] = '<tr>';
			$output[] = '<td><a href="cart.php?action=delete&id='.$id.'" class="r">Remove</a></td>';
			$output[] = '<td>'.$detail.' and '.$pid.'</td>';
			$output[] = '<td>&pound;'.$price.'</td>';
			$output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" /></td>';
			$output[] = '<td>&pound;'.($price * $qty).'</td>';
			$total += $price * $qty;
			$output[] = '</tr>';
		}
		$output[] = '</table>';
		$output[] = '<p>Grand total: <strong>&pound;'.$total.'</strong></p>';
		$output[] = '<div><button type="submit">Update cart</button></div>';
		$output[] = '</form>';
	} else {
		$output[] = '<p>You shopping cart is empty.</p>';
	}
	return join('',$output);
}

?>
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
<p><a href="checkout.html">checkout...</a></p>
</div>



</body>
</html>