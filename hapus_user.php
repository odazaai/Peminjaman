<?php
require_once("database.php");
$id = $_GET['id'];
$sql = Deleteuser("user", $id);
if ($sql) {
    header("location:user.php");
}
?>