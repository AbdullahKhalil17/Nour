<?php
ob_start();
session_start();
$pageTitle = "Order";
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/condb.php');

?>
<div class="content-wrapper">
  <div class="page-title">
    <div class="row">
      <div class="col-sm-6">
        <h4 class="mb-0"> <?php echo $pageTitle ?></h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pe-0 float-start float-sm-end">
          <li class="breadcrumb-item"><a href="../index.php" class="default-color">Home</a></li>
          <li class="breadcrumb-item active ps-0"><?php echo $pageTitle ?></li>
        </ol>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('.edit-order').click(function(e) {
      e.preventDefault();
      var orderId = $(this).data('order-id');
      var newStatus = 1;
      $.ajax({
        url: 'confirm-order.php',
        type: 'POST',
        dataType: 'json',
        data: {order_id: orderId, status: newStatus},
        success: function(response) {
          if (response.success) {
            location.reload();
          } else {
            alert("Failed to update order status: " + response.message);
          }
        },
        error: function(xhr, status, error) {
          alert("An error occurred while updating order status: " + error);
        }
      });
    });
  });
</script>


<?php
include('includes/footer.php');
?>
