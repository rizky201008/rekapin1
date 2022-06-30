<?php
include 'config.php';
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $connect->query("UPDATE users SET `nim`=$nim, `nama`='$nama', `alamat`='$alamat' WHERE `nim`='$nim';");
    header('Location: lihat.php');
?>