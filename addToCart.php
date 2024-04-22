<?php
session_start();
if(isset($_POST['productId']) && isset($_POST['quantity'])) {
    include('admin/config/condb.php');
  
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    $sql = "SELECT * FROM product WHERE id = $productId LIMIT 1";
    $result = mysqli_query($con, $sql);
    $product = mysqli_fetch_assoc($result);
    
if (isset($_SESSION['cart'])) {
  $found = false;
  foreach ($_SESSION['cart'] as $cartKey => $cartItem) {
      if ($cartItem['id'] == $productId) {
          $_SESSION['cart'][$cartKey]['quantity'] += $quantity;
          $_SESSION['cart'][$cartKey]['total_price'] = $_SESSION['cart'][$cartKey]['quantity'] * $_SESSION['cart'][$cartKey]['price'];
          $found = true;
          break;
      }
  }
  if (!$found) {
      $_SESSION['cart'][] = array(
          'id' => $productId,
          'product_name' => $product['product_name'],
          'price' => $product['price'],
          'image' => $product['image_product'],
          'quantity' => $quantity,
          'total_price' => $quantity * $product['price']
      );
  }
} else {
  $_SESSION['cart'][] = array(
      'id' => $productId,
      'product_name' => $product['product_name'],
      'price' => $product['price'],
      'image' => $product['image_product'],
      'quantity' => $quantity,
      'total_price' => $quantity * $product['price']
  );
}
    $totalItems = 0;
    $totalAmount = 0;
    foreach($_SESSION['cart'] as $item) {
        $totalItems += $item['quantity'];
        $totalAmount += $item['price'] * $item['quantity'];
    }
    echo json_encode(array('totalItems' => $totalItems, 'totalAmount' => $totalAmount));
}
?>
