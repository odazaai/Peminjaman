<?php
require_once("database.php");

$id = $_POST['id'];
$kodebrg = $_POST['kode_barang'];
$namabrg = $_POST['nama_barang'];
$kategori = $_POST['kategori'];
$merk = $_POST['merk'];
$jml = $_POST['jumlah'];

$simpan = inputdata ("INSERT INTO barang VALUES ('$id', '$kodebrg', '$namabrg', '$kategori', '$merk', '$jml')");

if ($simpan) {
    header("location:data_barang.php");
}
?>