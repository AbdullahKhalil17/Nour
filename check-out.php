<?php
session_start();
include('admin/config/condb.php');
include('web/includes/header.php');
// Calculate total amount
$totalAmount = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $cartItem) {
        $totalAmount += intval($cartItem['price']) * intval($cartItem['quantity']);
    }
}

// دالة لتوليد رقم الطلب
function generateOrderNumber() {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $random_string = '';
    for ($i = 0; $i < 6; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $random_string .= $characters[$index];
    }
    return $random_string;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['order_total']) && isset($_SESSION['user_data']['id'])) {
      $client_id = $_SESSION['user_data']['id'];
      $order_total = $_POST['order_total'];
      $order_date = date('Y-m-d');

      $order_number = generateOrderNumber();
      
      $sql = "INSERT INTO orders (client_id, order_total, order_date, order_number) 
      VALUES ('$client_id', '$order_total', '$order_date', '$order_number')";

      $sql_run = mysqli_query($con, $sql);
      $order_id = mysqli_insert_id($con);
      foreach ($_SESSION['cart'] as $item) {
          $product_id = $item['id'];
          $qty = $item['quantity'];
          $price = $item['price'];
          $sql = "INSERT INTO order_details (order_id, product_id, qty, price) 
          VALUES ('$order_id', '$product_id', '$qty', '$price')";
          $sql_run = mysqli_query($con, $sql);
      }
      // بعد إضافة الطلب بنجاح
    $_SESSION['order_number'] = $order_number;
      
      header('Location: confirm-order.php');
      
  } else {
  }
} else {
}
?>

<body>
  <?php
  include('web/includes/main-header.php');
  ?>
  <!-- End Header Area -->

  <section class="checkout-wrapper section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="checkout-steps-form-style-1">
            <ul id="accordionExample">
              <li>
                <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                  <form action="check-out.php" method="POST">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="single-form form-default">
                        <label>User Name</label>
                        <div class="row">
                          <div class="col-md-12 form-input form">
                            <input type="text" placeholder="First Name" value="<?php echo $_SESSION['user_data']['client_name']; ?>">
                            <input type="text" name="order_total" value="<?php echo $_SESSION['cart_subtotal']; ?>">
                            <input type="hidden" name="client_id" value="<?php echo $_SESSION['user_data']['id']; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="single-form form-default">
                        <label>Email Address</label>
                        <div class="form-input form">
                          <input type="text" placeholder="Email Address" value="<?php echo $_SESSION['user_data']['client_name']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="single-form form-default">
                        <label>Phone Number</label>
                        <div class="form-input form">
                          <input type="text" placeholder="Phone Number" value="<?php echo $_SESSION['user_data']['client_phone']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="single-form form-default">
                        <label>Mailing Address</label>
                        <div class="form-input form">
                          <input type="text" placeholder="Mailing Address" value="<?php echo $_SESSION['user_data']['client_address']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="single-checkbox checkbox-style-3">
                        <input type="checkbox" id="checkbox-3">
                        <label for="checkbox-3"><span></span></label>
                        <p>My delivery and mailing addresses are the same.</p>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="single-form button">
                        <button class="btn collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Submit Order</button>
                      </div>
                    </div>
                  </div>
                  </form>
                </section>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="checkout-sidebar">
            <div class="checkout-sidebar-price-table mt-30">
              <h5 class="title">Pricing Table</h5>

              <div class="sub-total-price">
                <div class="total-price">
                  <p class="value">Subotal Price:</p>
                  <p class="price">$144.00</p>
                </div>
                <div class="total-price shipping">
                  <p class="value">Subotal Price:</p>
                  <p class="price">$10.50</p>
                </div>
                <div class="total-price discount">
                  <p class="value">Subotal Price:</p>
                  <p class="price">$10.00</p>
                </div>
              </div>

              <div class="total-payable">
                <div class="payable-price">
                  <p class="value">Subotal Price:</p>
                  <p class="price">$<?php echo $_SESSION['cart_subtotal']; ?></p>
                </div>
              </div>
              <div class="price-table-btn button">
                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
              </div>
            </div>
            <div class="checkout-sidebar-banner mt-30">
              <a href="product-grids.html">
                <img src="https://via.placeholder.com/400x330" alt="#">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  include('web/includes/footer.php')
  ?>
</body>

</html>
