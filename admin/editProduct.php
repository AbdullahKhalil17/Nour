<?php
ob_start();
session_start();
$pageTitle = "Product";
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/condb.php');

if(isset($_POST['saveData']))
{
  $id = $_POST['id'];
  $product_name = $_POST['product_name'];
  $price = $_POST['price'];
  $made_in = $_POST['made_in'];

  // Handle image upload
  $image_product = $_FILES['image_product']['name'];
  $temp_image = $_FILES['image_product']['tmp_name'];
  $image_destination = "assets/images/image_product/" . $image_product; // Directory to store the uploaded image

  move_uploaded_file($temp_image, $image_destination); // Move uploaded image to the destination folder


  $sql = "UPDATE product SET product_name = '".$product_name."', price = '".$price."', made_in = '".$made_in."', image_product = '".$image_product."' WHERE id = '".$id."' LIMIT 1";

  $sql_run = mysqli_query($con , $sql);
  if($sql_run)
  {
    header("Location: product.php");
  }
  else{
    header("Location: product.php");
  }
}


?>
<div class="content-wrapper">
  <div class="page-title">
    <div class="row">
      <div class="col-sm-6">
        <h4 class="mb-0"><?php echo $pageTitle ?></h4>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <?php
                if(isset($_GET['id'])){
                  $id = $_GET['id'];
                  $sql = "SELECT id, product_name, price, made_in FROM product WHERE id = $id LIMIT 1";
                  $sql_run = mysqli_query($con, $sql);
                  if(mysqli_num_rows($sql_run) > 0 )
                  {
                    foreach($sql_run as $items)
                    {
                      ?>
                        <input type="hidden" value="<?php echo $items['id'] ?>" name="id">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Product Name</label>
                              <input type="text" name="product_name" value="<?php echo $items['product_name'] ?>" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Price</label>
                              <input type="number" name="price" value="<?php echo $items['price'] ?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Made in</label>
                              <input type="text" name="made_in" value="<?php echo $items['made_in'] ?>" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Image</label>
                              <input type="file" name="image_product" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <button type="submit" name="saveData" class="btn btn-primary">Submit</button>
                      <?php
                    }
                  }
                }
              ?>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>

<?php
include('includes/footer.php');
?>