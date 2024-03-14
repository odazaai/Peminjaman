<?php
define ('DB_HOST', 'localhost');
define ('DB_USER', 'root');
define ('DB_PASS', '');
define ('DB_NAME', 'sts_peminjaman');
$connect=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Failed to connect to MYSQL: " . mysqli_error($connect));

function query($kueri)
{
    global $connect;
    $result=mysqli_query($connect, $kueri);
    $rows=[];
    while($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }
    return $rows;
}

function cek_login($username, $password){
    global $connect;
    $uname = $username;
    $upass = $password;

    $hasil = mysqli_query($connect, "select * from user where username='$uname' and password='$upass'");
    $cek = mysqli_num_rows($hasil);

    $sql = mysqli_fetch_array($hasil);
    if($cek > 0 ){
        $_SESSION['username'] = $sql['username'];
        $_SESSION['role'] = $sql['role'];
        return true;
    } 
    else {
        return false;
    }
}

function inputdata($inputdata)
{
    global $connect;
    $sql=mysqli_query($connect, $inputdata);
    return $sql;
}

function inputpeminjaman($inputpeminjaman)
{
    global $connect;
    $sql=mysqli_query($connect, $inputpeminjaman);
    return $sql;
}

function inputuser($inputdata)
{
    global $connect;
    $sql=mysqli_query($connect, $inputdata);
    return $sql;
}

function Deletebarang($tablename, $id)
{
    global $connect;
    $hasil=mysqli_query($connect, "Delete from $tablename where id='$id'");
    return $hasil;
}

function Deletepeminjaman($tablename, $id)
{
    global $connect;
    $hasil=mysqli_query($connect, "Delete from $tablename where id='$id'");
    return $hasil;
}

function Deleteuser($tablename, $id)
{
    global $connect;
    $hasil=mysqli_query($connect, "Delete from $tablename where id='$id'");
    return $hasil;
}

function Editbarang($tablename, $id)
{
    global $connect;
    $hasil=mysqli_query($connect, "SELECT * FROM $tablename WHERE id='$id'");
    return $hasil;
}

function Editpeminjaman($tablename, $id)
{
    global $connect;
    $hasil=mysqli_query($connect, "SELECT * FROM $tablename WHERE id='$id'");
    return $hasil;
}

function Edituser($tablename, $id)
{
    global $connect;
    $hasil=mysqli_query($connect, "SELECT * FROM $tablename WHERE id='$id'");
    return $hasil;
}

function updatebarang($table, $data, $id)
{
    global $connect;
    $sql = "UPDATE $table SET kode_barang = '$data[kode_barang]', nama_barang = '$data[nama_barang]', kategori = '$data[kategori]', merk = '$data[merk]', jumlah = '$data[jumlah]' WHERE id = '$id'";
    $hasil=mysqli_query($connect, $sql);
    return $hasil;
}

function updatepeminjaman($table, $data, $id)
{
    global $connect;
    $sql = "UPDATE $table SET tgl_pinjam = '$data[tgl_pinjam], tgl_kembali = '$data[tgl_kembali]', no_identitas = '$data[no_identitas], 
    kode_barang = '$data[kode_barang]', jumlah = '$data[jumlah]', keperluan = '$data[keperluan], status = '$data[status]', id_login = '$data[id_login]'";
    $hasil = mysqli_query($connect, $id);
    return $hasil;
}

function updateuser($table, $data, $id)
{
    global $connect;
    $sql = "UPDATE $table SET no_identitas ='$data[no_identitas], nama='$data[nama]', username='$data[username], password='$data[password]', role='$data[role]'";
    $hasil = mysqli_query($connect, $sql);
    return $hasil;
}

function tampil_data()
{
    global $connect;
    $result=mysqli_query($connect, "SELECT peminjaman.tgl_pinjam, peminjaman.tgl_kembali, peminjaman.no_identitas, user.nama, peminjaman.kode_barang, barang.nama_barang, peminjaman.jumlah, peminjaman.keperluan, peminjaman.status, peminjaman.id_login FROM peminjaman INNER JOIN barang 
    ON barang.kode_barang = peminjaman.kode_barang INNER JOIN user ON peminjaman.no_identitas = user.no_identitas;");
    $rows=[];
    while($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }
    return $rows;
}

function total_barang($query){
    global $connect;
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connect));
    }
    $row = mysqli_fetch_row($result);
    if (!$row) {
        die("No rows returned");
    }
    return $row[0];
}

function total_user($query){
    global $connect;
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connect));
    }
    $row = mysqli_fetch_row($result);
    if (!$row) {
        die("No rows returned");
    }
    return $row[0];
}

function total_stok($query){
    global $connect;
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connect));
    }
    $row = mysqli_fetch_row($result);
    if (!$row) {
        die("No rows returned");
    }
    return $row[0];
}

function total_dipinjam($query){
    global $connect;
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connect));
    }
    $row = mysqli_fetch_row($result);
    if (!$row) {
        die("No rows returned");
    }
    return $row[0];
}
?>