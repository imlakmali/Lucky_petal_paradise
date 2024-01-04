<?php
include 'connection.php';
session_start();

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
}

/*-----------delete products in wishlist-------------------*/
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM `wishlist` WHERE id = '$delete_id' ")
        or die('Query failed to delete wishlist items related to the product');

    header('location:wishlist.php');
}
/*-----------delete products in wishlist-------------------*/
if (isset($_GET['delete_all'])) {


    mysqli_query($conn, "DELETE FROM `wishlist` WHERE user_id = '$user_id' ")
        or die('Query failed to delete wishlist items related to the product');

    header('location:wishlist.php');
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
        <h1>my wishlist</h1>
        <p>Lorem ipsum dolor sit </p>

    </div>
    <div class="shop">
        <h1 class="title">product added in wishlist</h1>
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
        <div class="box-container">
            <?php
            $grand_total = 0;
            $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'")
                or die('query failed1');

            if (mysqli_num_rows($select_wishlist) > 0) {
                while ($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)) {


            ?>
                    <form action="" method="post" class="box">
                        <div class="icon">
                            <a href="wishlist.php?delete=<?php echo $fetch_wishlist['id']; ?>" class="fa-regular fa-x"></a>
                            <a href=" view_page.php?pid=<?php echo $fetch_wishlist['id']; ?>" class="fa-solid fa-eye"></a>
                        </div>                                                      
                        <img src="image/<?php echo $fetch_wishlist['image']; ?>">
                        <div class="price">Rs<?php echo $fetch_wishlist['price']; ?>/-</div>
                        <div class="name"><?php echo $fetch_wishlist['name']; ?></div>
                        <input type="hidden" name="product_id" value="<?php echo $fetch_wishlist['id']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_wishlist['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['image']; ?>">
                        <button type="submit" name="add_to_cart" class="btn2">add to cart<i class="fa-solid fa-cart-arrow-down"></i></button>

                    </form>

            <?php
                    $grand_total += $fetch_wishlist['price'];
                }
            } else {
                echo '<img src = "img/empty-animation1">';
            }

            ?>

        </div>
        <div class="wishlist_total">
            <p>total amount payble : <span>Rs<?php echo $grand_total; ?></span></p>
            <a href="shop.php">continue shopping</a>
            <a href="wishlist.php?delete_all" class="btn2 <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>" onclick="return confirm('do you want to delete all from wishlist')">delete all</a>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="script.js"></script>
</body>

</html> 