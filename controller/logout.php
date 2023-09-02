<?php
    session_start(); // Mulai sesi
    session_destroy(); // Hancurkan sesi
    header("Location: ../view/login.php"); // Redirect ke halaman login setelah logout
    exit();
?>
