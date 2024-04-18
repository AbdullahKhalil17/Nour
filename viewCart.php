<?php
session_start();
include('admin/config/condb.php');
include('web/includes/header.php');

// حساب الإجمالي
$totalAmount = 0;
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $index => $cartItem) {
    // Fetch price of the current product
    $product_price = $cartItem['price'];
    // Calculate total amount
    $totalAmount += $cartItem['total_price'];
  }
}

// تخزين الإجمالي في session
$_SESSION['cart_subtotal'] = $totalAmount;
?>

<body>
  <?php
  include('web/includes/main-header.php');
  ?>
  <!-- End Header Area -->

  <div class="shopping-cart section">
    <div class="container">
      <div class="cart-list-head">
        <!-- Cart List Title -->
        <div class="cart-list-title">
          <div class="row">
            <div class="col-lg-1 col-md-1 col-12"></div>
            <div class="col-lg-4 col-md-3 col-12">
              <p>Product Name</p>
            </div>
            <div class="col-lg-2 col-md-2 col-12">
              <p>Quantity</p>
            </div>
            <div class="col-lg-2 col-md-2 col-12">
              <p>Subtotal</p>
            </div>
            <div class="col-lg-2 col-md-2 col-12">
              <p>Discount</p>
            </div>
            <div class="col-lg-1 col-md-2 col-12">
              <p>Remove</p>
            </div>
          </div>
        </div>
        <!-- End Cart List Title -->
        <!-- Cart Single List list -->
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $index => $cartItem) {
            // Fetch price of the current product
            $product_price = $cartItem['price'];
            // Calculate total amount
            $totalAmount += $cartItem['total_price'];
        ?>
            <div class="cart-single-list">
              <div class="row align-items-center">
                <div class="col-lg-1 col-md-1 col-12">
                  <a href="product-details.html"><img src="admin/assets/images/image_product/<?php echo $cartItem['image']; ?>" alt="#"></a>
                </div>
                <div class="col-lg-4 col-md-3 col-12">
                  <h5 class="product-name"><a href="product-details.html"><?php echo $cartItem['product_name']; ?></a></h5>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                  <div class="count-input">
                    <select class="form-control quantity" data-index="<?php echo $index; ?>">
                      <?php
                      // Display quantity options
                      for ($i = 1; $i <= 5; $i++) {
                        echo "<option" . ($cartItem['quantity'] == $i ? " selected" : "") . ">$i</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                  <p id="total_price_<?php echo $index; ?>"><?php echo $cartItem['total_price'] . " L.E"; ?></p>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                  <p><?php echo isset($cartItem['discount']) ? "L.E" . $cartItem['discount'] : "—"; ?></p>
                </div>
                <div class="col-lg-1 col-md-2 col-12">
                  <a class="remove-item" href="removeItem.php?id=<?php echo $cartItem['id']; ?>"><i class="lni lni-close"></i></a>
                </div>
              </div>
            </div>
        <?php
          }
        } else {
          echo '<p>No items in cart</p>';
        }
        ?>
      </div>
      <div class="row">
        <div class="col-12">
          <!-- Total Amount -->
          <!-- Total Amount -->
          <div class="total-amount">
            <div class="row">
              <div class="col-lg-8 col-md-6 col-12">
                <div class="left">
                  <div class="coupon">
                    <form action="#" target="_blank">
                      <input name="Coupon" placeholder="Enter Your Coupon">
                      <div class="button">
                        <button class="btn">Apply Coupon</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-12">
                <div class="right">
                  <ul>
                    <li id="cart_subtotal">Cart Subtotal<span><?php echo "L.E" . $totalAmount; ?></span></li>
                    <!-- Discount can be calculated here if applicable -->
                    <!-- Example: <li>You Save<span>$29.00</span></li> -->
                    <!-- Example: <li class="last">You Pay<span>$2531.00</span></li> -->
                  </ul>
                  <div class="button">
                    <?php
                    if (isset($_SESSION['user_data'])) {
                      // عرض زر الشراء إذا كان المستخدم مسجل الدخول
                    ?>
                      <a href="check-out.php?ids=<?php
                        $ids = array();
                        foreach ($_SESSION['cart'] as $item) {
                          $ids[] = $item['id'];
                        }
                        echo implode(',', $ids);
                        ?>" class="btn">Checkout</a>
                    <?php
                    } else {
                    ?>
                      <p>Please <a href="login.php">login</a> to proceed with checkout.</p>
                    <?php
                    }
                    ?>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <!--/ End Total Amount -->

          <!--/ End Total Amount -->
        </div>
      </div>
    </div>
  </div>

  <?php
  include('web/includes/footer.php')
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.quantity').change(function() {
        var index = $(this).data('index');
        var quantity = $(this).val();
        var price = parseFloat(<?php echo $product_price; ?>);
        var subtotal = quantity * price;

        $('#total_price_' + index).text(subtotal.toFixed(2) + ' L.E');

        var totalAmount = 0;
        $('.quantity').each(function() {
          var qty = $(this).val();
          var idx = $(this).data('index');
          var prc = parseFloat(<?php echo $_SESSION['cart'][$index]['price']; ?>);
          var sub = qty * prc;
          totalAmount += sub;
        });

        $('#cart_subtotal span').text(totalAmount.toFixed(2) + ' L.E');
      });
    });
  </script>


</body>

</html>