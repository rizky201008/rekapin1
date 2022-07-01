<?php
include '../config.php';
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$connect->query("UPDATE tb_olahraga SET `nama`='$nama', `id_kategori`='$kategori';");
header('Location: index.php');
