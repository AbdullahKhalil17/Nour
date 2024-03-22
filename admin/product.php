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
  $product_name = $_POST['product_name'];
  $price = $_POST['price'];
  $made_in = $_POST['made_in'];

  $sql = "INSERT INTO product (product_name, price, made_in)
    VALUES ('$product_name', '$price', '$made_in')";
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
          <form action="" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Product Name</label>
                  <input type="text" name="product_name" class="form-control" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Price</label>
                  <input type="number" name="price" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Made in</label>
                  <input type="text" name="made_in" class="form-control" required>
                </div>
              </div>
            </div>
            <button type="submit" name="saveData" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" role="tabpanel" aria-labelledby="customer-tab">
              <div class="table-responsive mt-15">
                <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                  <thead>
                    <tr class="table-info text-danger" style="font-family: 'Cairo', sans-serif;">
                      <th>اسم المنتج</th>
                      <th> السعر</th>
                      <th>بلد المنشاء</th>
                      <th>العمليات</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = "SELECT * FROM product";
                      $sql_run = mysqli_query($con, $sql);
                      if(mysqli_num_rows($sql_run) > 0 )
                      {
                        foreach($sql_run as $item)
                        {
                          ?>
                            <tr style="font-family: 'Cairo', sans-serif;">
                              <td><?= $item['product_name'] ?></td>
                              <td><?= $item['price'] ?></td>
                              <td><?= $item['made_in'] ?></td>
                              <td>
                                <!-- <a href="<?php $item['id'] ?>">تعديل</a> -->
                                <a href="editProduct.php?id=<?php echo $item['id']; ?>">تعديل</a>
                              </td>
                            </tr>
                          <?php
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php
include('includes/footer.php');
?>