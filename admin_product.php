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
// -----adding products to database-------
if(isset($_POST['add_product'])){
    $product_name = mysqli_real_escape_string($conn, $_POST['name']);
    $product_price = mysqli_real_escape_string($conn, $_POST['price']);
    $product_detail = mysqli_real_escape_string($conn, $_POST['detail']);

    // File details
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'image/'.$image;

    $select_product_name = mysqli_query($conn, "SELECT name FROM `products`WHERE name = '$product_name'")
        or die('query failed1');
        if(mysqli_num_rows($select_product_name)>0){
            $message[] = 'product name already exist';
        }else{
            $insert_product = mysqli_query($conn, "INSERT INTO `products`(`name`, `price`, `product_delail`, `image`)
            VALUES('$product_name', '$product_price', '$product_detail', '$image')") 
                or die('query failed 2');

            if($insert_product){
                if($image_size > 2000000){
                    $message[] = 'product image size is too large';
                }else{
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'product added successfully'; 
                }
            }
        }

}
?>
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
    <section class="add-products">
        <form method="post" action="" enctype="multipart/form-data">
            <h1 class="title">add new product</h1>
            <div class="input-field">
                <label>product name</label>
                <input type="text" name="name" required>
            </div>
            <div class="input-field">
                <label>product price</label>
                <input type="text" name="price" required>
            </div>
            <div class="input-field">
                <label>product detail</label>
                <textarea name="detail" required></textarea>
            </div>
            <div class="input-field">
                <label>product image</label>
                <input type="file" name="image" accept="image/jpg, image/png, image/jpeg, image/webp" required>
            </div>
            <input type="submit" name="add_product" value="add product" class="btn">
        </form>
    </section>
    <!---------------show product section-------------->
    <section class="show-products">
        <div class="box-container">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`")
                or die('query failed');
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {


            ?>
                    <div class="box">
                        <img src="image/<?php echo $fetch_products['image']; ?>">
                        <p>price : Rs <?php echo $fetch_products['price']; ?></p>
                        <h4><?php echo $fetch_products['name']; ?></h4>
                        <p class="detail"> <?php echo $fetch_products['product_detail']; ?></p>
                        <a href="admin_product.php?edit=<?php echo $fetch_products['id'] ?>" class="edit">edit</a>
                        <a href="admin_product.php?delete=<?php echo $fetch_products['id'] ?>" class="delete" oneclick="return conform('delete this product');">delete</a>
                    </div>
            <?php                                                                  // therun na chuttak wath.
                }
            }

            ?>
        </div>
    </section>
    <!--------- edit product-------------->
    <section class="update-container">
        <?php
        if (isset($_GET['edit'])) {
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id= $edit_id")
                or die('query failed 7');
            if (mysqli_num_rows($edit_query) > 0) {
                while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {
       

        ?>
        <form method="post" action="" enctype="multipart/form-data">
            <img src="image/<?php echo $fetch_edit['image']; ?>">
            <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
            <input type="text" name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
            <input type="number" min="0" name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
            <textarea name="update_p_detail" ><?php echo $fetch_edit['product_detail']; ?></textarea>
            <input type="file" name="update_p_image" accept="image/png,image/jpg,image/jpeg,image/webp" >
            <input type="submit" name="update_product" value="update" class="edit">
            <input type="reset"  value="cancle" class="option-btn btn" id="close-edit">
        </form>
        <?php 
                        }
                    }
                    echo "<script>document.querySelector('.update-container').style.display='block';</script>";
                }
        ?>

    </section>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>


