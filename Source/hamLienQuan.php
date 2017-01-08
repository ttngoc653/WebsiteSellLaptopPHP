<?php 
function getCart() {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    return $_SESSION["cart"];
}

function setCart($id, $q) {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    if (array_key_exists($id, $_SESSION["cart"])) {
        $_SESSION["cart"][$id] += $q;
    } else {
        $_SESSION["cart"][$id] = $q;
    }
}

function cart_sum_items() {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    $ret = 0;
    foreach ($_SESSION["cart"] as $id => $quantity) {
    	if(is_integer($id))
        	$ret += $quantity;
    }

    return $ret;
}
?>