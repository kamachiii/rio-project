<?php
session_start();
require_once '../config/db.php';

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username = '$username'");

    if($result){
        $query = $result->fetch_assoc();
        if(password_verify($password, $query['password'])){
            echo "
                <script>alert('Successfully Login')</script>
            ";
            $_SESSION['logged_in'] = true;
            header("Location: ../index.php");
            exit();
        }
    }
    header('Location: ../view/login.php?msg=fail');
}
?>
