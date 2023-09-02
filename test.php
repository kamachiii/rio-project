<?php
require_once 'config/db.php';
// if connection is error
if (!$conn) {
    die('Koneksi Error : '.mysqli_connect_errno()
    .' - '.mysqli_connect_error());
 }
 // koneksi berhasil
 echo 'Koneksi Berhasil : '.mysqli_get_host_info($conn)."<br />
 dengan Host : $dbHost, User : $dbUser, Pass : $dbPassword, Nama DB : $dbName. <br />
 stats : ".mysqli_stat($conn);

 // tutup koneksi
 mysqli_close($conn);
?>
