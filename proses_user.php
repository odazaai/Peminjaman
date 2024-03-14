<?php
require_once("database.php");

$iduser = $_POST['id'];
$noidn = $_POST['no_identitas'];
$nama = $_POST['nama'];
$status = $_POST['status'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$simpan = inputuser ("INSERT INTO user VALUES ('$iduser', '$noidn', '$nama', '$status', '$username', '$password', '$role')");

if ($simpan) {
    header("location:data_user.php");
}
?>