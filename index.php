<?php
// session_start();
include('admin/config/condb.php');
include('web/includes/header.php');
?>

<body>
  <div class="preloader">
    <div class="preloader-inner">
      <div class="preloader-icon">
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- /End Preloader -->

  <?php
  include('web/includes/main-header.php');
  ?>
  <!-- Start Trending Product Area -->
  <section class="trending-product section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title">
            <h2>المنتجات المتاحة</h2>
            <p>أفضل الاسعار و أفضل المنتجات</p>
          </div>
        </div>
      </div>
      <div class="row">

        <!-- Start Single Product -->
        <?php
        $sql = "SELECT * FROM product";
        $sql_run = mysqli_query($con, $sql);
        foreach ($sql_run as $items) {
        ?>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="single-product">
              <div class="product-image">
                <!-- <img src="admin/assets/images/image_product/ <?= $items['image_product'] ?>" alt="#"> -->
                <img src="admin/assets/images/image_product/<?= $items['image_product'] ?>" alt="#">
                <div class="button">
                  <a href="product_details.php?id=<?= $items['id'] ?>" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                </div>
              </div>
              <div class="product-info">
                <span class="category">Watches</span>
                <h4 class="title">
                  <a href="#"><?= $items['product_name'] ?></a>
                </h4>
                <ul class="review">
                  <li><i class="lni lni-star-filled"></i></li>
                  <li><i class="lni lni-star-filled"></i></li>
                  <li><i class="lni lni-star-filled"></i></li>
                  <li><i class="lni lni-star-filled"></i></li>
                  <li><i class="lni lni-star"></i></li>
                  <li><span>4.0 Review(s)</span></li>
                </ul>
                <div class="price">
                  <span><?= $items['price'] ?> L.E</span>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
        <!-- End Single Product -->

      </div>
    </div>
  </section>






  <?php
  include('web/includes/footer.php')
  ?>
</body>

</html>