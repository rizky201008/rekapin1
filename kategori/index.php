<?php
include '../config.php';
$lihat_query = mysqli_query($connect, "SELECT * FROM `tb_kategori`");
$no = 1;
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $cek_id = mysqli_query($connect, "SELECT * FROM tb_kategori WHERE id_kategori=" . $id);
    $status_id = mysqli_num_rows($cek_id);

    if ($status_id == 0) {
        $connect->query("INSERT INTO tb_kategori (id_kategori,nama) VALUES ($id,'$nama')");
        $id = null;
        $nama = null;
        header('Location: index.php');
    } else {
        echo '<script>alert("Maaf ID Kategori Sudah Tersedia")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h1 class="fs-3">Tambah Kategori</h1>
                <form action="" method="post">
                    <label for="id" class="form-label">
                        Id Kategori:</label>
                    <input type="text" name="id" id="id" class="form-control" required><br>
                    <label for="nama" class="form-label">
                        Nama Kategori:</label>
                    <input type="text" name="nama" id="nama" class="form-control" maxlength="30" required><br>
                    <button name="submit" class="btn btn-primary w-100">TAMBAHKAN</button>
                </form>
                <a href="../index.php"><button class="btn btn-warning mt-3 mb-3 w-100">Kembali Ke Home</button></a>
            </div>
        </div>
    </div>
    <hr>
    <!-- Table -->
    <section id="table">
        <h1 class="text-center">Daftar Kategori</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($data = mysqli_fetch_array($lihat_query)) :
                            ?>
                                <tr>
                                    <th scope="row">
                                        <?= $no++ ?>
                                    </th>
                                    <td>
                                        <?= $data['nama'] ?>
                                    </td>
                                    <td>
                                        <a href="ubah.php?id_kategori=<?= $data['id_kategori'] ?>"><button class="btn btn-primary mb-1 mt-1">Update</button></a>
                                        <a href="hapus.php?id_kategori=<?= $data['id_kategori'] ?>"><button class="btn btn-danger mb-1 mt-1">Hapus</button></a>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>