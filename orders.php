<?php
include 'connection.php';
session_start();

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
}

?>


<style type="text/css">
    <?php include 'main.css'; ?>
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"   />
    <title>Lucky Petal Paradise</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="banner">
        <h1>order</h1>
        <p>Lorem ipsum dolor sit </p>
    </div>
    <div class="order-section">
        <div class="box-container">
            <?php
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id= '$user_id'")
                or die('order query failed');

            if (mysqli_num_rows($select_orders) > 0) {
                while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {


            ?>
            
                    <div class="box">
                        <p>placed on : <span><?php echo $fetch_orders['placed_on'] ?></span></p>
                        <p>name : <span><?php echo $fetch_orders['name'] ?></span></p>
                        <p>number: <span><?php echo $fetch_orders['number'] ?></span></p>
                        <p>email : <span><?php echo $fetch_orders['email'] ?></span></p>
                        <p>address: <span><?php echo $fetch_orders['address'] ?></span></p>
                        <p>payment method: <span><?php echo $fetch_orders['method'] ?></span></p>
                        <p>your order : <span><?php echo $fetch_orders['total_product'] ?></span></p>
                        <p>total price : <span><?php echo $fetch_orders['total_price'] ?></span></p>
                        <p>payment ststus: <span><?php echo $fetch_orders['payment_status'] ?></span></p>
                    </div>
            <?php
                }
            } else {
                echo '
                    <div class="empty">
                        <img src="img/giphy.gif">
                        <p>No order place yet</p>
                    </div>
                ';
            }
            ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>