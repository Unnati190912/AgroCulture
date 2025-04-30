<?php
    session_start();
    
    if ($_SESSION['logged_in'] != 1 || $_SESSION['Category'] != 0) {
        $_SESSION['message'] = "You must log in as a buyer to view this page!";
        header("location: Login/error.php");
        exit();
    }

    $email = $_SESSION['Email'];
    $name = $_SESSION['Name'];
    $user = $_SESSION['Username'];
    $mobile = $_SESSION['Mobile'];
    $address = $_SESSION['Addr'];
    $active = $_SESSION['Active'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buyer Profile - AgroCulture</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-xlarge.css" />
</head>
<body>
    <?php require 'menu.php'; ?>

    <section id="banner" class="wrapper">
        <div class="container">
            <header class="major">
                <h2>Buyer Profile</h2>
            </header>

            <?php if(isset($_SESSION['message'])): ?>
                <p><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
            <?php endif; ?>

            <?php if(!$active): ?>
                <div class="alert alert-warning">
                    Account is not verified! Please confirm your email by clicking on the email link!
                </div>
            <?php endif; ?>

            <div class="row uniform">
                <div class="12u">
                    <div class="profile-info">
                        <h3><?php echo htmlspecialchars($name); ?></h3>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                        <p><strong>Username:</strong> <?php echo htmlspecialchars($user); ?></p>
                        <p><strong>Mobile:</strong> <?php echo htmlspecialchars($mobile); ?></p>
                        <p><strong>Address:</strong> <?php echo htmlspecialchars($address); ?></p>
                    </div>
                </div>
            </div>

            <div class="row uniform">
                <div class="4u 12u$(xsmall)">
                    <a href="market.php" class="button special">Digital Market</a>
                </div>
                <div class="4u 12u$(xsmall)">
                    <a href="myCart.php" class="button special">My Cart</a>
                </div>
                <div class="4u 12u$(xsmall)">
                    <a href="Login/logout.php" class="button special">Log Out</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html> 