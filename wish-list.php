<?php

require __DIR__ . '/includes/config.php';

use App\WishList;

$wishList = new WishList;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    
    if ($action == 'add') {
        // Add item to wishlist
        $wishList->addData($user_id, $product_id);

    } elseif ($action == 'remove') {
        // Remove item from wishlist
        $wishList->updateData($user_id, $product_id);
    }
}
?>