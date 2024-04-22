<?php
ob_start();
session_start();
$pageTitle = "Dashboard";
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/condb.php');
?>

<!--=================================
      wrapper -->
<div class="content-wrapper">
  <div class="page-title">
    <div class="row">
      <div class="col-sm-6">
        <h4 class="mb-0"> Dashboard</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pe-0 float-start float-sm-end">
          <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
          <li class="breadcrumb-item active ps-0">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
  <!-- widgets -->
  <div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 mb-20">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-start">
              <span class="text-danger">
                <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
              </span>
            </div>
            <div class="float-end text-end">
              <p class="card-text text-dark">Products</p>
              <?php
              $sql = "SELECT COUNT(*) as count FROM product";
              $sql_run = mysqli_query($con, $sql);
              $row = mysqli_fetch_row($sql_run);
              $count = $row[0]
              ?>
              <h4><?php echo $count; ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-xl-3 col-lg-6 col-md-6 mb-20">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-start">
              <span class="text-danger">
                <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
              </span>
            </div>
            <div class="float-end text-end">
              <p class="card-text text-dark">Money</p>
              <?php
              $sql = "SELECT SUM(order_total) FROM orders;                ";
              $sql_run = mysqli_query($con, $sql);
              $row = mysqli_fetch_row($sql_run);
              $count = $row[0]
              ?>
              <h4><?php echo $count; ?> L.E</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <h4>Product</h4>

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
                      if (mysqli_num_rows($sql_run) > 0) {
                        foreach ($sql_run as $item) {
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
    
    <h4>Order</h4>
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
                      <th>اسم العميل</th>
                      <th>رقم الطلب</th>
                      <th>قيمة الطلب</th>
                      <th>حالة الطلب</th>
                      <th>تاريخ الطلب</th>
                      <th>العمليات</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT clients.client_name, orders.id, orders.order_number, orders.client_id, orders.order_total, orders.order_status, orders.order_date FROM clients, orders WHERE clients.id = orders.client_id";
                    $sql_run = mysqli_query($con, $sql);
                    if (mysqli_num_rows($sql_run) > 0) {
                      foreach ($sql_run as $item) {
                    ?>
                        <tr style="font-family: 'Cairo', sans-serif;">
                          <td><?= $item['client_name'] ?></td>
                          <td><?= $item['order_number'] ?></td>
                          <td><?= $item['order_total'] ?></td>
                          <td>
                            <?php
                              if ($item['order_status'] == 2) {
                                echo "لم يتم تأكيد الطلب";
                              } else {
                                echo "تم تأكيد الطلب";
                              }
                            ?>
                          </td>
                          <td><?= $item['order_date'] ?></td>
                          <td>
                            <a href="#" class="edit-order btn btn-primary" data-order-id="<?= $item['id']; ?>">تعديل</a>
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
  <!-- Orders Status widgets-->
  <?php
  include('includes/footer.php');
  ?>