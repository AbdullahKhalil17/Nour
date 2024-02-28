<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 5 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>تسجيل الدخول</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- css -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin/css/rtl.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin/css/style.css') }}" /> -->
    <link rel="stylesheet" href="../assets/css/rtl.css">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

    <div class="wrapper">

        <!--=================================
    preloader -->
        <!-- <div id="pre-loader">
            <img src="{{ URL::asset('assets/admin/images/pre-loader/loader-01.svg') }}" alt="">
        </div> -->
        <!--=================================
    preloader -->

        <!--=================================
    login-->
        <section class="height-100vh d-flex align-items-center page-section-ptb login"
              style="background-image: url('../assets/images/login-bg1.jpg')">
            <div class="container">
                <div class="row justify-content-center g-0 vertical-align">
                  <div class="col-lg-4 col-md-6 login-fancy-bg bg" style="background-image: url(../assets/images/login-inner-bg.jpg">
                    <div class="login-fancy">
                        <!-- <h2 class="text-white mb-20" style="font-family: 'Cairo', sans-serif">مرحبا بك</h2> -->
                        <h2 class="text-white mb-20" style="font-family: 'Cairo', sans-serif">مرحبًا بك</h2>
                    </div>
                </div>
                
                    <div class="col-lg-4 col-md-6 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                        <br>
                            <h3 class="mb-30" style="font-family: 'Cairo', sans-serif">تسجيل الدخول</h3>
                            <form action="logincode.php" method="POST">
                                <div class="section-field mb-20">
                                    <label class="mb-10" for="name">البريد الالكترونى* </label>
                                    <input id="name" class="web form-control" type="text" placeholder="أكتب البريد الالكترونى" name="email">
                                </div>
                                <div class="section-field mb-20">
                                    <label class="mb-10" for="Password">كلمة السر* </label>
                                    <input id="Password" class="Password form-control" type="password" placeholder="أكتب كلمة السر" name="password">
                                </div>
                                <button class="button" type="submit" name="loginbtn"><span>تسجيل الدخول</span><i class="fa fa-check"></i></button>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
    login-->
    </div>

    <!--=================================
   jquery -->

    <!-- jquery -->
    <script src="../assets/js/jquery-3.3.1.min.js"></script>

    <!-- plugins-jquery -->
    <script src="../assets/js/plugins-jquery.js"></script>

    <!-- plugin_path -->
    <!-- <script type="text/javascript">
        var plugin_path = '{{ asset('assets/js/';
    </script> -->

    <!-- chart -->
    <script src="../assets/js/chart-init.js"></script>

    <!-- calendar -->
    <script src="../assets/js/calendar.init.js"></script>

    <!-- charts sparkline -->
    <script src="../assets/js/sparkline.init.js"></script>

    <!-- charts morris -->
    <script src="../assets/js/morris.init.js"></script>

    <!-- datepicker -->
    <script src="../assets/js/datepicker.js"></script>

    <!-- sweetalert2 -->
    <script src="../assets/js/sweetalert2.js"></script>

    <!-- toastr -->
    <script src="../assets/js/toastr.js"></script>

    <!-- validation -->
    <script src="../assets/js/validation.js"></script>

    <!-- lobilist -->
    <script src="../assets/js/lobilist.js"></script>

    <!-- custom -->
    <script src="../assets/js/custom.js"></script>

</body>

</html>
