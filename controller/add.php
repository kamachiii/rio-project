<?php
    require_once '../config/db.php'; // Adjust the path based on your directory structure

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password')";
        $conn->query($query);

        // Redirect or send a response back to the frontend
        if($query){
            echo "<script>alert('Data berhasil ditambah'); window.location.href='../index.php'</script>";
        }else{
            echo "<script>alert('Data gagal ditambah'); window.location.href='../index.php'</script>";
        }
    }else{
        header('Location: ../index.php');
    }


