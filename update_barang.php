<?php
require_once("database.php");

if(isset($_POST['submit'])){
    $id_brg = $_POST['id'];
    $kodebrg = $_POST['kode_barang'];
    $namabrg = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $merk = $_POST['merk'];
    $jumlah = $_POST['jumlah'];

    // Query SQL untuk update data barang
    $simpan = "UPDATE barang SET kode_barang='$kodebrg', nama_barang='$namabrg', kategori='$kategori', merk='$merk', jumlah='$jumlah' WHERE id='$id_brg'";

    // Eksekusi query
    $result = mysqli_query($connect, $simpan); // Pastikan $koneksi sudah didefinisikan sebelumnya di file "database.php"

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        header("location:data_barang.php");
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>
