<?php
require_once 'config.php';
    if (isset($_GET['nim'])) {
        $nim = $_GET['nim'];
        $connect->query("DELETE FROM users WHERE `nim`='$nim'");
        header('Location: lihat.php');
    }
    else {
        die('Nim Tidak Valid!');
    }
?>