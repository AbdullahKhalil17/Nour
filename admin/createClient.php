<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/condb.php');
$pageTitle = "Create Client";

if (isset($_POST['saveData'])) {
  $clientName = $_POST['client_name'];
  $clientPhone = $_POST['client_phone'];
  $clientAddress = $_POST['client_address'];
  $clientPass = $_POST['client_pass'];
  $clientEmail = $_POST['client_email'];

  $sql = "INSERT INTO clients (client_name, client_phone, client_address, client_pass, client_email) 
            VALUES ('$clientName', '$clientPhone', '$clientAddress', '$clientPass', '$clientEmail')";
if ($con->query($sql) === TRUE) {
  echo "Data saved successfully!";
} else {
  echo "Failed Save Data: " . $con->error;
}

}





?>

<!--=================================
      wrapper -->
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
          <form action="createClient.php" method="post" style="font-family: 'Cairo', sans-serif;">
            <h3 style="font-family: 'Cairo', sans-serif;">Create Client</h3>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Client Name</label>
                  <input type="text" name="client_name" class="form-control" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Client Phone</label>
                  <input type="tel" name="client_phone" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Address</label>
                  <input type="text" name="client_address" class="form-control" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" name="client_pass" class="form-control" required>
                </div>
              </div>
              <div class="col-md-12">
                <label for="">Email</label>
                <input type="email" name="client_email" class="form-control" required>
              </div>
              <br>
              <div class="modal-footer">
                <button type="submit" name="saveData" class="btn btn-success">Save Data</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- Orders Status widgets-->
  <?php
  include('includes/footer.php');
  ?>