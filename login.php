<?php
session_start();
include('admin/config/condb.php');
include('web/includes/header.php');

// التحقق من إرسال نموذج تسجيل الدخول
if(isset($_POST['loginbtn']))
{
  $email = $_POST['client_email'];
  $password = $_POST['client_pass'];

  $log_query = "SELECT * FROM clients WHERE (client_email='$email') AND client_pass='$password' LIMIT 1";
  $log_query_run = mysqli_query($con, $log_query);
  if(mysqli_num_rows($log_query_run) > 0)
  {
    $user_data = mysqli_fetch_assoc($log_query_run);
    // تخزين بيانات المستخدم في الجلسة
    $_SESSION['user_data'] = $user_data;

    // التوجيه إلى صفحة عملية الشراء
    header("Location: check-out.php");
    exit();
  }
  else
  {
    $error = "Your Login Name or Password is invalid";
  }
}
?>

<body>
  <?php
  include('web/includes/main-header.php');
  ?>

  <div class="account-login section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
          <form class="card login-form" method="post">
            <div class="card-body">
              <div class="title">
                <h3>Login Now</h3>
                <p>You can login using your social media account or email address.</p>
              </div>
              <!-- إضافة حقل خفي لرابط الصفحة السابقة -->
              <input type="hidden" name="redirect_from" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
              <div class="form-group input-group">
                <label for="reg-fn">Email</label>
                <input class="form-control" type="email" name="client_email" id="reg-email" required="">
              </div>
              <div class="form-group input-group">
                <label for="reg-fn">Password</label>
                <input class="form-control" type="password" name="client_pass" id="reg-pass" required="">
              </div>
              <div class="d-flex flex-wrap justify-content-between bottom-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input width-auto" id="exampleCheck1">
                  <label class="form-check-label">Remember me</label>
                </div>
                <a class="lost-pass" href="account-password-recovery.html">Forgot password?</a>
              </div>
              <div class="button">
                <button class="btn" name="loginbtn" type="submit">Login</button>
              </div>
              <?php if(isset($error)): ?>
                <p class="error-message"><?php echo $error; ?></p>
              <?php endif; ?>
              <p class="outer-link">Don't have an account? <a href="register.html">Register here </a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  include('web/includes/footer.php')
  ?>

</body>

</html>
