<?php
require_once("database.php");
$id = $_GET['id'];
$sql = Deletepeminjaman("peminjaman", $id);
if ($sql) {
    header("location:data_peminjaman.php");
}
?>