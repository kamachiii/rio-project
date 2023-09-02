<?php
    require_once '../config/db.php';
    $id = $_GET['id'];
    $data = $conn->query('SELECT * FROM  users WHERE id = '.$id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Import Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


    <!-- Local CSS -->
    <link rel="stylesheet" href="../resource/css/style.css">

    <title>Edit Data</title>
</head>
<body>
    <!-- Container -->
    <div class="container">
        <h1 class="text-center mt-5">Learn Native - CRUD PHP Native</h1>
        <?php if(isset($_GET['msg']) && $_GET['msg'] == 'fail') echo "<script>alert('Gagal melakukan update!')</script>" ?>
            <br />
        <?php
            foreach ($data as $user) :
        ?>
        <!-- Form -->
        <form method="post" action="../controller/update.php" class="form-group mt-5">
            <!-- Form Container -->
            <div class="form-container">
                <div class="row g-3 align-item-center mb-3">
                    <input type="text" name="id" value="<?=$user['id']?>" hidden>
                    <div class="col-auto">
                        <input value="<?=$user['name']?>" type="text" name="name" placeholder="Masukkan Nama" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="col-auto">
                        <input value="<?=$user['username']?>" type="text" name="username" placeholder="Masukkan Alamat" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="col-auto password-container">
                        <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control" autocomplete="off" required>
                        <span class="toggle-password" id="togglePassword">
                            <img src="../resource/img/eye.svg" alt="Mata Terbuka" id="eyeOpen"> <!-- Open Eye Image -->
                            <img src="../resource/img/eye-slash.svg" alt="Mata Tertutup" id="eyeClosed"> <!-- Close Eye Image -->
                        </span>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-success" type="submit" id="submit" name="submit">Submit</button>
                    </div>
                </div>
                <a href="index.php" class="btn btn-primary">Cancel</a>
            </div>
            <!-- End Form Container -->
            <?php endforeach ?>

        </form>
        <!-- End Form -->

    </div>


    <!-- Local Script -->
    <script src="../resource/js/script.js"></script>

</body>
</html>
