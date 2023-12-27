<?php
include 'connection.php';
session_start();

$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
}
if (isset($_POST['logout'])) {
    session_destroy();
    header('location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
</head>

<body>
    <?php include 'admin_header.php'; ?>
    <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '
                            <div class="message">
                                <span> ' . $message . '  </span>
                                <i class =" bi bi-x-circle" onclick="this.parentElement.remove()"></i>
                            </div>
                    ';
            }
        }
    ?>
    <section class="order-container">
        <h1 class="title">total placed order</h1>
        <div class="box-container">
            <?php 
                $select_orders = mysqli_query($conn,"SELECT * FROM `orders`") or dir('query failed 1');
                if(mysqli_num_rows($select_orders)>0){
                    while($fetch_orders = mysqli_fetch_assoc($select_orders)){

               
            ?>
            <div class="box">
                <p>user name: <span><?php echo ?></span></p>
            </div>
            <?php 
                     }
                 }
            ?>
        </div>
    </section>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>