<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    $_SESSION['logged_in'] = false;
}
if($_SESSION['logged_in'] == true){
    header("Location: ../index.php");
    exit();
}
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

    <title>Login</title>
</head>
<body>

    <!-- Container -->
    <div class="container">
        <!-- Form -->
        <form method="post" action="../controller/login.php" class="form-group mt-5">
            <!-- Form Container -->
            <div class="form-container">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center"><h3>LOGIN</h3></div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['msg']) && $_GET['msg'] == 'fail'){
                                echo "<script>alert('Username or Password is wrong!')</script>";
                            }
                        ?>
                        <div class="row g-3 align-item-center mb-3">
                            <!-- input username -->
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" placeholder="Masukkan Username" class="form-control" autocomplete="off" required>

                            <!-- input password -->
                            <div class="password-container">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control" autocomplete="off" required>
                                <span class="toggle-password-login" id="togglePassword">
                                    <img src="../resource/img/eye.svg" alt="Mata Terbuka" id="eyeOpen"> <!-- Open Eye Image -->
                                    <img src="../resource/img/eye-slash.svg" alt="Mata Tertutup" id="eyeClosed"> <!-- Close Eye Image -->
                                </span>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-auto">
                                <button class="btn btn-success" type="submit" id="submit" name="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form Container -->

        </form>
        <!-- End Form -->
    </div>


    <!-- Import Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- Local Script -->
    <script src="../resource/js/script.js"></script>
</body>
</html>
