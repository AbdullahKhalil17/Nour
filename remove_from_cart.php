<?php
session_start();
if(isset($_POST['id'])) {
  $productId = $_POST['id'];
  
  if(isset($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $key => $item) {
      if($item['id'] == $productId) {
        unset($_SESSION['cart'][$key]);
        break; 
      }
    }
  }
}
?>
