<?php
// التحقق من طريقة الطلب
include('config/condb.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['order_id']) && isset($_POST['status'])) {
      $order_id = $_POST['order_id'];
      $status = $_POST['status'];
      $sql = "UPDATE orders SET order_status = '$status' WHERE id = '$order_id'";
      if(mysqli_query($con, $sql)) {
          echo json_encode(array("success" => true));
      } else {
          echo json_encode(array("success" => false, "message" => "Failed to update order status."));
      }
  } else {
      echo json_encode(array("success" => false, "message" => "Missing order ID or status."));
  }
} else {
  echo json_encode(array("success" => false, "message" => "Invalid request method."));
}
?>