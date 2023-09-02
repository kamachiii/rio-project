<?php
    require_once '../config/db.php'; // Adjust the path based on your directory structure

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $datas = $conn->query('SELECT * FROM  users WHERE id = '.$id);

        foreach($datas as $data){
            $query = "UPDATE users SET name='$name', username='$username', password='$password' WHERE id=$id";
            $update = $conn->query($query);
        }

        // Redirect or send a response back to the frontend
        if($update){
            header('Location: ../index.php?msg=success');
        }else{
            header('Location: ../view/edit.php?id='.$id.'msg=fail');
        }
    }else{
        header('Location: ../index.php?msg=fail');
    }


