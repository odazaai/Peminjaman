<?php
require_once("database.php");

$id = $_POST['id'];
$tglpnjm = $_POST['tgl_pnjm'];
$tglkmbli = $_POST['tgl_kmbli'];
$noidn = $_POST['no_idn'];
$kode_brg = $_POST['kode_barang'];
$jml = $_POST['jml'];
$kprluan = $_POST['kprl'];
$status = $_POST['status'];
$idlogin = $_POST['id_login'];

$save = inputpeminjaman ("INSERT INTO peminjaman VALUES ('$id', '$tglpnjm', '$tglkmbli', '$noidn', '$kode_brg', '$jml', '$kprluan', '$status', '$idlogin')");

if ($save) {
    header("location:data_peminjaman.php");
}
?>