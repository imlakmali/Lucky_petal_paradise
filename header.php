<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <Header class="header">
        <div class="flex">
            <a href="admin.php" class="logo">Lucky petal <span>paradise</span></a>
            <nav class="navbar">

                <a href="index.php">Home</a>
                <a href="shop.php">shop</a>
                <a href="orders.php">Orders</a>
                <a href="about.php">about us</a>
                <a href="contact.php">contact</a>
                

            </nav>
            <div class="icons">
                <i class="fa-solid fa-user" id="user-btn"></i>
                
                    <?php
                        $select_wishlist= mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'")
                            or die('query failed 1');
                        $wishlist_num_rows = mysqli_num_rows($select_wishlist);
                    ?>
                    <a href="wishlist.php"><i class="fa-solid fa-heart"></i><span>(<?php echo $wishlist_num_rows; ?>)</span></a>
                    <?php
                        $select_cart= mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'")
                            or die('query failed 2');
                        $cart_num_rows = mysqli_num_rows($select_cart);
                    ?>
                    <a href="cart.php"><i class="fa-solid fa-cart-arrow-down"></i><span>(<?php echo $cart_num_rows; ?>)</span></a>
                <i class="fa-solid fa-list" id="menu-btn"></i>

            </div>
            <div class="user-box">

                <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
                <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>

                <form method="post" class="logout">
                    <button name="logout" class="logout-btn">LOG OUT</button>
                </form>
            </div>
        </div>
    </Header>

    <script type="text/javascript" src="script.js"></script>
</body>

</html>