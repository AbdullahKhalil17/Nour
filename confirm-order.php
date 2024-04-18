<?php
session_start();
include('admin/config/condb.php');
include('web/includes/header.php');
include('web/includes/main-header.php');
?>
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (isset($_SESSION['order_number'])) : ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Success!</h4>
                    <p>Your order has been placed successfully.</p>
                    <hr>
                    <p class="mb-0">Your order number is: <?php echo $_SESSION['order_number']; ?></p>
                </div>
            <?php else : ?>
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Error!</h4>
                    <p>Something went wrong.</p>
                    <hr>
                    <p class="mb-0">No order number found.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
include('web/includes/footer.php');
?>
