<!-- Import DB -->
<?php
    session_start();
    require_once 'config/db.php';

    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false){
        header("Location: view/login.php");
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
    <link rel="stylesheet" href="resource/css/style.css">

    <title>Dashboard</title>
</head>
<body>
    <!-- Container -->
    <div class="container">
        <div class="row mt-5 justify-content-between">
            <div class="col-auto">
                <h1>Dashboard</h1>
            </div>
            <div class="col-auto">
                <a href="controller/logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
            <br />
            <?php if(isset($_GET['msg'])) :?>
                <?php
                    $alert = $_GET['msg'];
                    if($alert =='success'){
                        $message = 'Successfully';
                    }else if($alert == 'fail'){
                        $message = 'Failure';
                    }
                    echo "<script>alert('$message')</script>";
                ?>
            <?php endif?>
        <!-- Form -->
        <form method="post" action="controller/add.php" class="form-group mt-3">
            <!-- Form Container -->
            <div class="form-container">
                <div class="row g-3 justify-content-between mb-3">
                    <!-- input name -->
                    <div class="col-auto">
                        <input type="text" name="name" placeholder="Masukkan Nama" class="form-control" autocomplete="off" required>
                    </div>

                    <!-- input username -->
                    <div class="col-auto">
                        <input type="text" name="username" placeholder="Masukkan Username" class="form-control" autocomplete="off" required>
                    </div>

                    <!-- input password -->
                    <div class="col-auto password-container">
                        <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control" autocomplete="off" required>
                        <span class="toggle-password" id="togglePassword">
                            <img src="resource/img/eye.svg" alt="Mata Terbuka" id="eyeOpen"> <!-- Open Eye Image -->
                            <img src="resource/img/eye-slash.svg" alt="Mata Tertutup" id="eyeClosed"> <!-- Close Eye Image -->
                        </span>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-auto">
                        <button class="btn btn-success" type="submit" id="submit" name="submit">Submit</button>
                    </div>
                </div>
            </div>
            <!-- End Form Container -->

        </form>
        <!-- End Form -->

        <!-- Table -->
        <table class="table table-bordered mt-3">
            <!-- Head table -->
            <tr>
                <th class="text-center">NO</th>
                <th class="text-center">NAME</th>
                <th class="text-center">USERNAME</th>
                <th class="text-center">CREATED AT</th>
                <th class="text-center">UPDATED AT</th>
                <th class="text-center" colspan="2">ACTION</th>
            </tr>
            <!-- End Head table -->

            <!-- Call data -->
            <?php
                $query = $conn->query('SELECT * FROM users');
                $i = 1;

                while($data = $query->fetch_assoc()) : // Call data using while loop
            ?>
            <!-- Body table -->
            <tr>
                <td class="text-center"><?= $i++?></td>
                <td class="text-center"><?= $data['name']?></td>
                <td class="text-center"><?= $data['username']?></td>
                <td class="text-center"><?= date("d-F-Y H:i:s", strtotime($data['created_at']))?></td>
                <td class="text-center"><?= date("d-F-Y H:i:s", strtotime($data['updated_at']))?></td>
                <td class="text-center">
                    <!-- Action Button -->
                    <a href="view/edit.php?id=<?=$data['id']?>" class="btn btn-warning">Edit</a>
                    <a href="controller/delete.php?id=<?=$data['id']?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <!-- end Body table -->

            <?php
                endwhile;
            ?>
            <!-- end Call data -->

        </table>
    </div>
    <!-- End Container -->


    <!-- Import Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- Local Script -->
    <script src="resource/js/script.js"></script>
</body>
</html>
