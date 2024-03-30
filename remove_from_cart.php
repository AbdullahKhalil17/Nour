<?php
session_start();
// include('admin/config/condb.php');
// تحقق من وجود معرف المنتج
if(isset($_POST['id'])) {
  $productId = $_POST['id'];
  
  // تحقق من وجود السلة في الجلسة
  if(isset($_SESSION['cart'])) {
    // البحث عن المنتج في السلة وحذفه
    foreach($_SESSION['cart'] as $key => $item) {
      if($item['id'] == $productId) {
        unset($_SESSION['cart'][$key]); // حذف المنتج
        break; // انهاء البحث بعد الحذف
      }
    }
  }
}
?>
