<?php
    require_once '../config/db.php';
    $id = $_GET['id'];
    $data = $conn->query('DELETE FROM  users WHERE id = '.$id);

    header("Location: ../index.php?msg=delete")
?>
