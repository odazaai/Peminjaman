<?php
require_once("database.php");

if(isset($_POST['submit'])){
    $iduser = $_POST['id'];
    $noidn = $_POST['no_identitas'];
    $nama = $_POST['nama'];
    $status = $_POST['status'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Query SQL untuk update data barang
    $simpan = "UPDATE user SET no_identitas='$noidn', nama='$nama', status='$status', username='$username', password='$password', role='$role' WHERE id='$iduser'";

    // Eksekusi query
    $result = mysqli_query($connect, $simpan); // Pastikan $koneksi sudah didefinisikan sebelumnya di file "database.php"

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        header("location:data_user.php");
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>
