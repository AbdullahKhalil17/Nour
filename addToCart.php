<?php
session_start();

// إضافة المنتج إلى السلة وتحديث العدد الجديد للعناصر والمبلغ الإجمالي
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
    

// تحقق من وجود عناصر في السلة
if (isset($_SESSION['cart'])) {
  $found = false; // تعيين المتغير للتحقق من وجود المنتج بالفعل في السلة
  foreach ($_SESSION['cart'] as $cartKey => $cartItem) {
      if ($cartItem['id'] == $productId) { // تحقق من وجود المنتج في السلة بالفعل
          // تحديث الكمية والسعر الإجمالي بناءً على الكمية الجديدة
          $_SESSION['cart'][$cartKey]['quantity'] += $quantity;
          $_SESSION['cart'][$cartKey]['total_price'] = $_SESSION['cart'][$cartKey]['quantity'] * $_SESSION['cart'][$cartKey]['price'];
          $found = true; // تم العثور على المنتج في السلة
          break; // لا حاجة للاستمرار في الحلقة بمجرد العثور على المنتج
      }
  }

  // إذا لم يتم العثور على المنتج في السلة، قم بإضافته كعنصر جديد
  if (!$found) {
      $_SESSION['cart'][] = array(
          'id' => $productId,
          'product_name' => $product['product_name'],
          'price' => $product['price'],
          'image' => $product['image_product'],
          'quantity' => $quantity,
          'total_price' => $quantity * $product['price'] // حساب السعر الإجمالي
      );
  }
} else {
  // إذا كانت السلة فارغة، قم بإضافة المنتج كعنصر جديد
  $_SESSION['cart'][] = array(
      'id' => $productId,
      'product_name' => $product['product_name'],
      'price' => $product['price'],
      'image' => $product['image_product'],
      'quantity' => $quantity,
      'total_price' => $quantity * $product['price'] // حساب السعر الإجمالي
  );
}
    $totalItems = 0;
    $totalAmount = 0;
    foreach($_SESSION['cart'] as $item) {
        $totalItems += $item['quantity'];
        $totalAmount += $item['price'] * $item['quantity'];
    }
    
    // إرجاع بيانات العربة بصيغة JSON
    echo json_encode(array('totalItems' => $totalItems, 'totalAmount' => $totalAmount));
}
?>
