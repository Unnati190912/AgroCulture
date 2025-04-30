<?php
    session_start();
    if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] == 0) {
        $_SESSION['message'] = "You need to first login to access this page !!!";
        header("Location: Login/error.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AgroCulture: Order Success</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-xlarge.css" />
</head>
<body>
    <?php require 'menu.php'; ?>

    <section id="main" class="wrapper style1 align-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="checkout-container" style="background: white; padding: 40px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-top: 20px;">
                        <div class="text-center">
                            <i class="fa fa-check-circle" style="color: #28a745; font-size: 48px;"></i>
                            <h2 style="color: #28a745; margin-top: 20px;">Order Placed Successfully!</h2>
                            <?php if(isset($_SESSION['message'])): ?>
                                <p class="lead"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
                            <?php endif; ?>
                            <p>Your order has been placed and will be processed soon.</p>
                            <div style="margin-top: 30px;">
                                <a href="market.php" class="button special">Continue Shopping</a>
                                <a href="buyerProfile.php" class="button">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html> 