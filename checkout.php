<?php
    session_start();
    require 'db.php';
    
    if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] == 0) {
        $_SESSION['message'] = "You need to first login to access this page !!!";
        header("Location: Login/error.php");
    }

    $bid = $_SESSION['id'];
    
    // Calculate cart total
    $total = 0;
    $sql = "SELECT fp.* FROM mycart mc JOIN fproduct fp ON mc.pid = fp.pid WHERE mc.bid = '$bid'";
    $result = mysqli_query($conn, $sql);
    while($row = $result->fetch_array()) {
        $total += $row['price'];
    }

    if($total == 0) {
        header("Location: myCart.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AgroCulture: Checkout</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-xlarge.css" />
    <style>
        .checkout-container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 20px;
            color: #333;
        }
        .order-summary {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .form-section {
            margin-bottom: 30px;
        }
        .form-group label {
            color: #333;
            font-weight: bold;
        }
        .form-control {
            color: #333;
            background-color: #fff;
        }
        .form-control:focus {
            color: #333;
        }
        h2, h3, h4 {
            color: #333;
        }
        .text-muted {
            color: #666;
        }
        .product-item strong {
            color: #333;
        }
    </style>
</head>
<body>
    <?php require 'menu.php'; ?>

    <section id="main" class="wrapper style1 align-center">
        <div class="container">
            <header>
                <h2>Checkout</h2>
            </header>

            <div class="row">
                <div class="col-md-8">
                    <div class="checkout-container">
                        <form action="processCheckout.php" method="POST">
                            <div class="form-section">
                                <h3>Shipping Information</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" name="name" class="form-control" value="<?php echo $_SESSION['Name']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="text" name="mobile" class="form-control" value="<?php echo $_SESSION['Mobile']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['Email']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Shipping Address</label>
                                    <textarea name="address" class="form-control" rows="3" required><?php echo $_SESSION['Addr']; ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" name="city" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pincode</label>
                                            <input type="text" name="pincode" class="form-control" maxlength="6" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h3>Payment Method</h3>
                                <div class="form-group">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="payment_method" value="cod" checked>
                                            Cash on Delivery
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="total_amount" value="<?php echo $total; ?>">
                            <button type="submit" class="button special big">Place Order</button>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="checkout-container">
                        <div class="order-summary">
                            <h3>Order Summary</h3>
                            <?php
                            $sql = "SELECT fp.* FROM mycart mc JOIN fproduct fp ON mc.pid = fp.pid WHERE mc.bid = '$bid'";
                            $result = mysqli_query($conn, $sql);
                            while($row = $result->fetch_array()):
                            ?>
                            <div class="product-item" style="margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <strong><?php echo $row['product']; ?></strong>
                                        <p class="text-muted"><?php echo $row['pcat']; ?></p>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <span>₹<?php echo $row['price']; ?> /-</span>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                            
                            <div class="total" style="margin-top: 20px; padding-top: 10px; border-top: 2px solid #ddd;">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h4>Total</h4>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <h4>₹<?php echo $total; ?> /-</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html> 