<?php
include 'connection.php';
session_start();

$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
    exit();
}
if (isset($_POST['logout'])) {
    session_destroy();
    header('location:login.php');
    exit();
}
/*-------------deleting order detail from database------------*/ 
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    
        mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id' ") 
            or die('Query failed to delete wishlist items related to the product');
        
        header('location:admin_users.php');

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="style.css">
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
    <section class="message-container">
        <h1 class="title">total registered user</h1>
        <div class="box-container">
        <?php
            $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed 1');
            if (mysqli_num_rows($select_message) > 0) {
                while ($fetch_message = mysqli_fetch_assoc($select_message)) {


            ?>
            <div class="box">
               <p>user id: <span><?php echo $fetch_message['user_id']; ?></span></p> 
               <p>user name: <span><?php echo $fetch_message['name']; ?></span></p>
               <p>email: <span><?php echo $fetch_message['email']; ?></span></p>
               <p><?php echo $fetch_message['name']; ?></p>
               <a href="admin_message.php?delete=<?php echo $fetch_message['id']; ?>" class="delete"
                            onclick="return confirm('delete this')">delete</a>
              
            </div>
            <?php
                }
            }else{
                echo '<p class="empty">no message yet</p>';
            }
            ?>
            <div>
                
            </div>
        </div>
    </section>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>