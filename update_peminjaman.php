<?php
require_once("database.php");

if(isset($_POST['submit'])){
    $id_peminjaman = $_POST['id'];
    $tglpnjm = $_POST['tgl_pinjam'];
    $tglkmbl = $_POST['tgl_kembali'];
    $noidn = $_POST['no_identitas'];
    $kodebrg = $_POST['kode_barang'];
    $jumlah = $_POST['jumlah'];
    $keperluan = $_POST['keperluan'];
    $status = $_POST['status'];
    $idlogin = $_POST['id_login'];

    // Query SQL untuk update data barang
    $simpan = "UPDATE peminjaman SET tgl_pinjam='$tglpnjm', tgl_kembali='$tglkmbl', no_identitas='$noidn', kode_barang='$kodebrg',
    jumlah='$jumlah', keperluan='$keperluan', status='$status', id_login='$idlogin' WHERE id='$id_peminjaman'";

    // Eksekusi query
    $result = mysqli_query($connect, $simpan); // Pastikan $koneksi sudah didefinisikan sebelumnya di file "database.php"

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        header("location:data_peminjaman.php");
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>
