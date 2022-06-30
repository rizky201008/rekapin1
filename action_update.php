<?php
include 'config.php';
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jkelamin'];
$hobi = $_POST['hobi'];
$connect->query("UPDATE users SET `nim`=$nim, `nama`='$nama', `jenis-kelamin`='$jenis_kelamin', `hobi`='$hobi' WHERE `nim`='$nim';");
header('Location: index.php');
