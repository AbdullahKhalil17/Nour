<?php
// session_start();
include('admin/config/condb.php');
include('web/includes/header.php');
?>


<body>
  <?php
  include('web/includes/main-header.php');
  ?>
  <!-- End Header Area -->


  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT id, product_name, price, image_product, made_in FROM product WHERE id = $id LIMIT 1";
    $sql_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
      $item = mysqli_fetch_assoc($sql_run);
  ?>
      <!-- Start Item Details -->
      <section class="item-details section">
        <div class="container">
          <div class="top-area">
            <div class="row align-items-center">
              <div class="col-lg-6 col-md-12 col-12">
                <div class="product-images">
                  <main id="gallery">
                    <div class="main-img">
                      <!-- تحديد ارتفاع وعرض محدد للصورة -->
                      <img src="admin/assets/images/image_product/<?php echo $item['image_product'] ?>" id="current" alt="#" style="width: 100%; max-width: 400px; height: auto;">
                    </div>
                  </main>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-12">
                <div class="product-info">
                  <h2 class="title"><?php echo $item['product_name'] ?></h2>
                  <p class="category"><a href="javascript:void(0)">Action cameras</a></p>
                  <h3 class="price"><?php echo $item['price'] ?> L.E</h3>
                  <div class="bottom-content">
                    <div class="row align-items-end">
                      <div class="col-lg-4 col-md-4 col-12">
                        <div class="form-group quantity">
                          <label for="color">Quantity</label>
                          <input type="number" id="quantity" class="form-control" min="1" value="1">
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-12">
                        <div class="button cart-button">
                          <button class="btn" style="width: 100%;" onclick="addToCart(<?php echo $item['id']; ?>)">Add to Cart</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Item Details -->
  <?php
    }
  }
  ?>


  <?php
  include('web/includes/footer.php')
  ?>
  <!-- تضمين مكتبة jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    function addToCart(productId) {
      var quantity = document.getElementById('quantity').value;
      $.ajax({
        url: 'addToCart.php',
        type: 'post',
        data: {
          productId: productId,
          quantity: quantity
        },
        success: function(response) {
          alert('Product added to cart successfully!');
          location.reload();
        }
      });
    }
  </script>

</body>

</html>
