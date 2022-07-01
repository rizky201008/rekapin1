<?php
require_once '../config.php';
    if (isset($_GET['id_olahraga'])) {
        $id = $_GET['id_olahraga'];
        $connect->query("DELETE FROM tb_olahraga WHERE `id_olahraga`='$id';");
        header('Location: index.php');
    }
    else {
        die('Data Tidak Valid!');
    }
?>