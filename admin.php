<?php 
    include 'connection.php';
    session_start();

    $admin_id = $_SESSION['admin_id'];
    if(isset($admin_id)){
        header('location:login.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky Petal Paradise</title>
</head>
<body>
    
</body>
</html>