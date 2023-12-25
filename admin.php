<?php
include 'connection.php';
session_start();

$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
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
    <section class="dashboard">
        <h1 class="title">Dashboard</h1>
            <div class="box-container">
                <div class="box">
                    <?php
                        $total_pendings = 0;
                        $select_pendings = mysqli_query($conn, "SELECT * FROM `orders` WHERE payment_status ='pending' ");
                        while($fetch_pendings = mysqli_fetch_assoc($select_pendings)){
                            $total_pendings += $fetch_pendings['total_price'];
                        }
                    ?>
                </div>
            </div>
    </section>

    <script type="text/javascript" src="script.js"></script>
</body>

</html>