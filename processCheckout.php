<?php
    session_start();
    require 'db.php';

    if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] == 0) {
        $_SESSION['message'] = "You need to first login to access this page !!!";
        header("Location: Login/error.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bid = $_SESSION['id'];
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);

        // Get cart items
        $sql = "SELECT mc.*, fp.price FROM mycart mc 
                JOIN fproduct fp ON mc.pid = fp.pid 
                WHERE mc.bid = '$bid'";
        $result = mysqli_query($conn, $sql);
        
        $success = true;
        
        while($row = $result->fetch_array()) {
            $pid = $row['pid'];
            
            // Insert into transaction table with exact columns
            $sql = "INSERT INTO transaction (bid, pid, name, city, mobile, email, pincode, addr) 
                   VALUES ('$bid', '$pid', '$name', '$city', '$mobile', '$email', '$pincode', '$address')";
            
            if(!mysqli_query($conn, $sql)) {
                $success = false;
                break;
            }
        }

        if($success) {
            // Clear the cart only after all transactions are successful
            $sql = "DELETE FROM mycart WHERE bid = '$bid'";
            mysqli_query($conn, $sql);
            
            $_SESSION['message'] = "Order placed successfully! Thank you for shopping with us.";
            header("Location: orderSuccess.php");
        } else {
            $_SESSION['message'] = "Error processing your order! Please try again.";
            header("Location: error.php");
        }
    } else {
        header("Location: myCart.php");
    }
?> 