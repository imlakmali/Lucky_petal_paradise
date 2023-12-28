<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>

<body>
    <Header class="header">
        <div class="flex">
            <a href="admin.php" class="logo">Admin <span>Pannel</span></a>
            <nav class="navbar">

                <a href="admin.php">Home</a>
                <a href="admin_product.php">Products</a>
                <a href="admin_orders.php">Orders</a>
                <a href="admin_user.php">Users</a>
                <a href="admin_message.php">Message</a>

            </nav>
            <div class="icons">
                <i class="fa-solid fa-list" id="menu-btn"></i>
                <i class="fa-solid fa-user" id="user-btn"></i>

            </div>
            <div class="user-box">

                <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
                <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>

                <form method="post" class="logout">
                    <button name="logout" class="logout-btn">LOG OUT</button>
                </form>
            </div>
        </div>
    </Header>

</body>

</html>