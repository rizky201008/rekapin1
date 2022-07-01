<?php
require_once '../config.php';
    if (isset($_GET['id_kategori'])) {
        $id = $_GET['id_kategori'];
        $connect->query("DELETE FROM tb_kategori WHERE `id_kategori`='$id';");
        header('Location: index.php');
    }
    else {
        die('Data Tidak Valid!');
    }
?>