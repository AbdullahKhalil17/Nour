<?php
  ob_start();
  session_start();
  include('includes/header.php');
  include('includes/navbar.php');
  include('includes/sidebar.php');
  include('config/condb.php');
  $pageTitle = "Edit Client Data";

  if(isset($_POST['saveData']))
  {
    $id = $_POST['id'];
    $client_name = $_POST['client_name'];
    $client_phone = $_POST['client_phone'];
    $client_address = $_POST['client_address'];
    $client_email = $_POST['client_email'];
    $client_pass = $_POST['client_pass'];

    $sql = "UPDATE clients SET client_name = '".$client_name."', client_phone = '".$client_phone."', 
    client_address = '".$client_address."', client_email = '".$client_email."', client_pass = '".$client_pass."' WHERE id = '".$id."' LIMIT 1";
    
    $sql_run = mysqli_query($con, $sql);

    if($sql_run)
    {
      header("Location: createClient.php");
    
    }
    else{
      echo "Failed Update Data";
    }
  }
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
          <form action="editClient.php" method="post" style="font-family: 'Cairo', sans-serif;">
            <h3 style="font-family: 'Cairo', sans-serif;"><?php echo $pageTitle ?></h3>
            <div class="row">
              <?php
                if(isset($_GET['id'])){
                  $id = $_GET['id'];
                  $sql = "SELECT id, client_name, client_phone, client_address, client_pass, client_email FROM clients WHERE id = $id LIMIT 1";
                  $sql_run = mysqli_query($con, $sql);
                  if(mysqli_num_rows($sql_run) > 0 )
                  {
                    foreach($sql_run as $items)
                    {
                      ?>
                      <input type="text" value="<?php echo $items['id'] ?>" name="id">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Client Name</label>
                            <input type="text" name="client_name" value="<?php echo $items['client_name']?>" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Client Phone</label>
                                <input type="tel" name="client_phone" value="<?php echo $items['client_phone']?>" class="form-control" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="client_address" value="<?php echo $items['client_address']?>"  class="form-control" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="client_pass" value="<?php echo $items['client_pass']?>"  class="form-control" required>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="">Email</label>
                              <input type="email" name="client_email"  value="<?php echo $items['client_email']?>" class="form-control" required>
                            </div>
                            <br>
                            <div class="modal-footer">
                              <button type="submit" name="saveData" class="btn btn-success">Save Data</button>
                            </div>
                          </div>
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