<?php
include_once("./koneksi.php");
$id = $_GET['id_barang'];
$result = mysqli_query($mysqli, "DELETE FROM barang WHERE id_barang=$id");
header("Location:index.php");
?>