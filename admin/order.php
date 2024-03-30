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
                      <th>رقم الهاتف</th>
                      <th>العنوان</th>
                      <th>البريد الالكترونى</th>
                      <th>العمليات</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = "SELECT * FROM clients";
                      $sql_run = mysqli_query($con, $sql);
                      if(mysqli_num_rows($sql_run) > 0 )
                      {
                        foreach($sql_run as $item)
                        {
                          ?>
                            <tr style="font-family: 'Cairo', sans-serif;">
                              <td><?= $item['client_name'] ?></td>
                              <td><?= $item['client_phone'] ?></td>
                              <td><?= $item['client_address'] ?></td>
                              <td><?= $item['client_email'] ?></td>
                              <td>
                                <!-- <a href="<?php $item['id'] ?>">تعديل</a> -->
                                <a href="editClient.php?id=<?php echo $item['id']; ?>">تعديل</a>
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
<?php
include('includes/footer.php');
?>