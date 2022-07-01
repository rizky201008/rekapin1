<?php
include '../config.php';
$nama = $_POST['nama'];
$connect->query("UPDATE tb_kategori SET `nama`='$nama';");
header('Location: index.php');
