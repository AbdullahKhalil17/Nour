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
    <!-- <div class="col-xl-3 col-lg-6 col-md-6 mb-20">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-start">
              <span class="text-warning">
                <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
              </span>
            </div>
            <div class="float-end text-end">
              <p class="card-text text-dark">Orders</p>
              <h4>656</h4>
            </div>
          </div>
          <p class="text-muted pt-3 mb-0 mt-2 border-top">
            <i class="fa fa-bookmark-o me-1" aria-hidden="true"></i> Total sales
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-20">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-start">
              <span class="text-success">
                <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
              </span>
            </div>
            <div class="float-end text-end">
              <p class="card-text text-dark">Revenue</p>
              <h4>$65656</h4>
            </div>
          </div>
          <p class="text-muted pt-3 mb-0 mt-2 border-top">
            <i class="fa fa-calendar me-1" aria-hidden="true"></i> Sales Per Week
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-20">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-start">
              <span class="text-primary">
                <i class="fa fa-twitter highlight-icon" aria-hidden="true"></i>
              </span>
            </div>
            <div class="float-end text-end">
              <p class="card-text text-dark">Followers</p>
              <h4>62,500+</h4>
            </div>
          </div>
          <p class="text-muted pt-3 mb-0 mt-2 border-top">
            <i class="fa fa-repeat me-1" aria-hidden="true"></i> Just Updated
          </p>
        </div>
      </div>
    </div> -->
  </div>
  <!-- Orders Status widgets-->
  <?php
  include('includes/footer.php');
  ?>